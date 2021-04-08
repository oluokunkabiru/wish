<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarouselRequest;
use App\Http\Requests\themeRequest;
use App\Http\Requests\themeUpdateRequest;
use App\Http\Requests\WriterRequest;
use App\Models\Category;
use App\Models\Functionality;
use App\Models\Theme;
use App\Models\File as Files;
use App\Models\Templatesetup;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;
use PhpZip\ZipFile;
use SebastianBergmann\Template\Template;

class themeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $themies = Theme::with(['user', 'category'])->get();
        $categories = Category::orderby('id', 'desc')->get();


        // return $themies;
        return view('users.admin.theme.index', compact(['themies', 'categories']));
    }

    public function themePreview()
    {
        $themies = Theme::with(['user', 'category', 'media'])->orderBy('id', 'desc')->get();
        // return $themies;
        return view('users.admin.theme.view', compact(['themies']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::orderby('id', 'desc')->get();

        return view('users.admin.theme.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(themeRequest $request)
    {
        //
        $theme = new Theme();
        $theme->addMediaFromRequest('script')->usingFileName("js.zip")->usingName("js")->toMediaCollection('script');
        $theme->addMediaFromRequest('style')->usingFileName("css.zip")->usingName("css")->toMediaCollection('style');
        $theme->addMediaFromRequest('preview')->toMediaCollection('preview');
        $theme->addMediaFromRequest('interface')->usingFileName(str_replace(" ", "_", $request->name) . ".zip")->usingName(str_replace(" ", "_", $request->name))->toMediaCollection('interface');
        $theme->name = str_replace(" ", "_", $request->name);
        $theme->category_id = $request->category;
        $theme->status = $request->payment;
        $theme->price = $request->price;
        $theme->description = $request->description;
        $theme->user_id = Auth::user()->id;
        $theme->active = "disabled";
        $dir = public_path("/themes/" . $theme->name . "/");
        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0777, true, true);

            // echo "dirctory <br>";
        }
        $theme->save();
        $template = new Templatesetup();
        $template->theme_id = $theme->id;
        $template->user_id = Auth::user()->id;
        $template->save();
        return redirect()->route('theme.index')->with('success', "Theme upload successfully");
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $theme = Theme::find($id);
        // return $theme;
        return view('users.admin.template.'.$theme->name.".index", compact(['theme']));
    }

    public function previewTemplate($id)
    {
        $theme = Theme::find($id);
        // return $theme->name;
        $template = Templatesetup::where('theme_id', $id)->first();
        $availablefunction = !empty($template->functionality) ? json_decode($template->functionality, true) : [];
        $content = json_decode($template->content);
        $music = json_decode($template->music, true);
        $video = json_decode($template->video, true);
        $images = json_decode($template->image, true);
        // return $images['sliders'][0]['image'];
        $date = "2021-05-12";

        return view('users.admin.template.' . $theme->name . ".index", compact(['theme','images', 'content', 'music', 'video', 'music', 'date']));
    }

    public function presetup($id){
        $functions = Functionality::get();
        $theme = Theme::find($id);
        $template = Templatesetup::where('theme_id', $id)->first();
        $availablefunction = !empty($template->functionality) ? json_decode($template->functionality, true):[];
        $content = json_decode($template->content);
        $music = json_decode($template->music, true);
        $video = json_decode($template->video, true);
        $images = json_decode($template->image, true);

        // return prin($music);
        $medias = Files::with('media')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('users.admin.theme.presetup', compact(['functions','music', 'video', 'images',  'content', 'theme', 'medias', 'availablefunction' ]));
    }

    public function addFunction($functionid, $themename, $themeid, $functionname){
        $template = Templatesetup::where('theme_id', $themeid)->first();
        $previousFunction = !empty($template->functionality) ? json_decode($template->functionality, true):[];
        if(array_key_exists($functionid, $previousFunction)){
            unset($previousFunction[$functionid]);
            $message  = "$functionname removed successfully";
             $vb = json_encode($previousFunction);
        $template->functionality = $vb;
        $template->update();
        return redirect()->back()->with('unsuccess', $message);

        }else{
        $previousFunction[$functionid] =$functionname;
            $message  = "$functionname added successfully";
            $vb = json_encode($previousFunction);
        $template->functionality = $vb;
        $template->update();
        return redirect()->back()->with('success', $message);
        }


    }


    public function addCarousel(CarouselRequest $request){

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

        $caption = [];
        $themeid = $request->themeid;
        $template = Templatesetup::where('theme_id', $themeid)->first();

        $caption['image']=$request->image;
        $caption['caption'] = $request->caption;
        $caption['description'] = test_input($request->description);

        $previousContent = !empty($template->content)? json_decode($template->content, true):[];

        if(isset($previousContent['carousel'])){
            $totalCaption = count($previousContent['carousel']);
            $nextCaption = $totalCaption+1;
            $previousContent['carousel'][$nextCaption] = $caption;
        }else{
            $totalCaption = 0;
            $previousContent['carousel'][$totalCaption] =$caption;
        }
            $vb = json_encode($previousContent);
            $template->content = $vb;
            $template->update();
        return redirect()->back()->with('success', 'Carousel added successfully');
    }

    public function updateCarousel(CarouselRequest $request){

        $caption = [];
        $themeid = $request->themeid;
        $carouselId = $request->carouselId;
        $template = Templatesetup::where('theme_id', $themeid)->first();

        function testin($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $caption['image'] = $request->image;
        $caption['caption'] = $request->caption;
        $caption['description'] = testin($request->description);

        $previousContent = json_decode($template->content, true);

        if(array_key_exists($carouselId, $previousContent['carousel'])){
            $previousContent['carousel'][$carouselId] = $caption;
        }else{
            $previousContent['carousel'][$carouselId] = $caption;

        }
        $vb = json_encode($previousContent);
        $template->content = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Carousel updated successfully');


    }
    public function deleteCarousel($themeid, $carouselId){
        $template = Templatesetup::where('theme_id', $themeid)->first();
        $previousContent = json_decode($template->content, true);

        if (array_key_exists($carouselId, $previousContent['carousel'])) {
            unset($previousContent['carousel'][$carouselId]) ;
        }
        $vb = json_encode($previousContent);
        $template->content = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Carousel deleted successfully');


    }

    public function writerSetup(WriterRequest $request){
        $writers = $request->writer;
        $themeid = $request->themeid;
        // return $themeid;
        $template = Templatesetup::where('theme_id', $themeid)->first();
        $previousContent = !empty($template->content)?json_decode($template->content, true):[];
        $writer = [];
        $writer['name'] = $writers;
        if (isset($previousContent['writer'])) {
            $totalCaption = count($previousContent['writer']);
            $nextCaption = $totalCaption + 1;
            $previousContent['writer'][$nextCaption] = $writer;
        } else {
            $totalCaption = 0;
            $previousContent['writer'][$totalCaption] = $writer;
        }
        $vb = json_encode($previousContent);
        $template->content = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Writer added successfully');



    }

    public function writerSetupUpdate(WriterRequest $request){
            $themeid = $request->themeid;
            $writerid = $request->writerid;
            $writer = $request->writer;
            $writers = [];
            $template = Templatesetup::where('theme_id', $themeid)->first();
            $writers['name'] = $writer;

        $previousContent = json_decode($template->content, true);

        if(array_key_exists($writerid, $previousContent['writer'])){
            $previousContent['writer'][$writerid] = $writers;
        }else{
            $previousContent['writer'][$writerid] = $writers;

        }
        $vb = json_encode($previousContent);
        $template->content = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Writer updated successfully');
    }

    public function deleteWriter($themeid, $writerid)
    {
        $template = Templatesetup::where('theme_id', $themeid)->first();
        $previousContent = json_decode($template->content, true);


        if (array_key_exists($writerid, $previousContent['writer'])) {
            unset($previousContent['writer'][$writerid]);
        }
        $vb = json_encode($previousContent);
        $template->content = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Carousel deleted successfully');
    }

    public function addMusicBefore(Request $request){
        $themeid = $request->themeid;

        // return $themeid;
        $music = $request->music;
        $template = Templatesetup::where('theme_id', $themeid)->first();
        // return $template;
        $previousMusic = !empty($template->music) ? json_decode($template->music, true):[];
        // $musicBefore = [];
        // $musicBefore = $music;
        $previousMusic ['musicbefore']= $music;
        // return $previousMusic;
        $vb = json_encode($previousMusic);
        $template->music = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Music before added successfully');



    }
    public function updateMusicBefore(Request $request){
        $themeid = $request->themeid;

        // return $themeid;
        $music = $request->music;
        $template = Templatesetup::where('theme_id', $themeid)->first();
        // return $template;
        $previousMusic = json_decode($template->music, true);
        // $musicBefore = [];
        if (array_key_exists("musicbefore", $previousMusic)) {
            $previousMusic['musicbefore'] = $music;
            // return "exit";
        } else {
            $previousMusic['musicbefore'] = $music;
            // return "Not exist";
        }
        // $previousMusic = $musicBefore;
        // return $previousMusic;
        $vb = json_encode($previousMusic);
        $template->music = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Music before updated successfully');
    }
    public function deleteMusicBefore($themeid){
        $template = Templatesetup::where('theme_id', $themeid)->first();
        $previousMusic = json_decode($template->music, true);

        if (array_key_exists("musicbefore", $previousMusic)) {
            unset($previousMusic['musicbefore']);
            // return "exit";
        }
        $vb = json_encode($previousMusic);
        $template->music = $vb;
        $template->update();
        return redirect()->back()->with('unsuccess', 'Music before deleted successfully');

    }


    public function addMusicAfter(Request $request)
    {
        $themeid = $request->themeid;

        // return $themeid;
        $music = $request->music;
        $template = Templatesetup::where('theme_id', $themeid)->first();
        // return $template;
        $previousMusic = json_decode($template->music, true);
        // $musicBefore = [];
        // $musicAfter = $music;
        $previousMusic['musicafter'] = $music;
        // return $previousMusic;
        $vb = json_encode($previousMusic);
        $template->music = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Music After added successfully');
    }
    public function updateMusicAfter(Request $request)
    {
        $themeid = $request->themeid;

        // return $themeid;
        $music = $request->music;
        $template = Templatesetup::where('theme_id', $themeid)->first();
        // return $template;
        $previousMusic = json_decode($template->music, true);
        // $musicBefore = [];
        if (array_key_exists("musicafter", $previousMusic)) {
            $previousMusic['musicafter'] = $music;
            // return "exit";
        } else {
            $previousMusic['musicafter'] = $music;
            // return "Not exist";
        }
        // $previousMusic = $musicAfter;
        // return $previousMusic;
        $vb = json_encode($previousMusic);
        $template->music = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Music after updated successfully');
    }
    public function deleteMusicAfter($themeid)
    {
        $template = Templatesetup::where('theme_id', $themeid)->first();
        $previousMusic = json_decode($template->music, true);

        if (array_key_exists("musicafter", $previousMusic)) {
            unset($previousMusic['musicafter']);
            // return "exit";
        }
        $vb = json_encode($previousMusic);
        $template->music = $vb;
        $template->update();
        return redirect()->back()->with('unsuccess', 'Music After deleted successfully');
    }

    public function addMusicOn(Request $request)
    {
        $themeid = $request->themeid;

        // return $themeid;
        $music = $request->music;
        $template = Templatesetup::where('theme_id', $themeid)->first();
        // return $template;
        $previousMusic = json_decode($template->music, true);
        // $musicOn = [];
        // $musicOn['musicon'] = $music;
        $previousMusic['musicon'] = $music;
        // return print_r($previousMusic);


        // $previousMusic = $musicOn;
        // return $previousMusic;
        $vb = json_encode($previousMusic);
        $template->music = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Music On added successfully');
    }
    public function updateMusicOn(Request $request)
    {
        $themeid = $request->themeid;

        // return $themeid;
        $music = $request->music;
        $template = Templatesetup::where('theme_id', $themeid)->first();
        // return $template;
        $previousMusic = json_decode($template->music, true);
        // $musicOn = [];
        if (array_key_exists("musicon", $previousMusic)) {
            $previousMusic['musicon'] = $music;
            // return "exit";
        } else {
            $previousMusic['musicon'] = $music;
            // return "Not exist";
        }
        // $previousMusic = $musicOn;
        // return $previousMusic;
        $vb = json_encode($previousMusic);
        $template->music = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Music On updated successfully');
    }
    public function deleteMusicOn($themeid)
    {
        $template = Templatesetup::where('theme_id', $themeid)->first();
        $previousMusic = json_decode($template->music, true);

        if (array_key_exists("musicon", $previousMusic)) {
            unset($previousMusic['musicon']);
            // return "exit";
        }
        $vb = json_encode($previousMusic);
        $template->music = $vb;
        $template->update();
        return redirect()->back()->with('unsuccess', 'Music On deleted successfully');
    }

    //videos

    public function addVideoBefore(Request $request)
    {
        $themeid = $request->themeid;

        // return $themeid;
        $video = $request->video;
        $template = Templatesetup::where('theme_id', $themeid)->first();
        // return $template;
        $previousVideo = json_decode($template->video, true);
        // $musicBefore = [];
        // $videoBefore = $video;
        $previousVideo['videobefore'] = $video;
        // return $previousvideo;
        $vb = json_encode($previousVideo);
        $template->video = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Video before added successfully');
    }
    public function updateVideoBefore(Request $request)
    {
        $themeid = $request->themeid;

        // return $themeid;
        $video = $request->video;
        $template = Templatesetup::where('theme_id', $themeid)->first();
        // return $template;
        $previousVideo = json_decode($template->video, true);
        // $videoBefore = [];
        if (array_key_exists("videobefore", $previousVideo)) {
            $previousVideo['videobefore'] = $video;
            // return "exit";
        } else {
            $previousVideo['videobefore'] = $video;
            // return "Not exist";
        }
        // $previousvideo = $videoBefore;
        // return $previousvideo;
        $vb = json_encode($previousVideo);
        $template->video = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Video before updated successfully');
    }
    public function deleteVideoBefore($themeid)
    {
        $template = Templatesetup::where('theme_id', $themeid)->first();
        $previousVideo = json_decode($template->video, true);

        if (array_key_exists("videobefore", $previousVideo)) {
            unset($previousVideo['videobefore']);
            // return "exit";
        }
        $vb = json_encode($previousVideo);
        $template->video = $vb;
        $template->update();
        return redirect()->back()->with('unsuccess', 'Video before deleted successfully');
    }


    public function addVideoAfter(Request $request)
    {
        $themeid = $request->themeid;

        // return $themeid;
        $video = $request->video;
        $template = Templatesetup::where('theme_id', $themeid)->first();
        // return $template;
        $previousVideo = json_decode($template->video, true);
        // $videoBefore = [];
        // $VideoAfter = $video;
        $previousVideo['videoafter'] = $video;
        // return $previousvideo;
        $vb = json_encode($previousVideo);
        $template->video = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Video After added successfully');
    }
    public function updateVideoAfter(Request $request)
    {
        $themeid = $request->themeid;

        // return $themeid;
        $video = $request->video;
        $template = Templatesetup::where('theme_id', $themeid)->first();
        // return $template;
        $previousVideo = json_decode($template->video, true);
        // $videoBefore = [];
        if (array_key_exists("videoafter", $previousVideo)) {
            $previousVideo['videoafter'] = $video;
            // return "exit";
        } else {
            $previousVideo['videoafter'] = $video;
            // return "Not exist";
        }
        // $previousvideo = $videoAfter;
        // return $previousvideo;
        $vb = json_encode($previousVideo);
        $template->video = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Video after updated successfully');
    }
    public function deleteVideoAfter($themeid)
    {
        $template = Templatesetup::where('theme_id', $themeid)->first();
        $previousVideo = json_decode($template->video, true);

        if (array_key_exists("videoafter", $previousVideo)) {
            unset($previousVideo['videoafter']);
            // return "exit";
        }
        $vb = json_encode($previousVideo);
        $template->video = $vb;
        $template->update();
        return redirect()->back()->with('unsuccess', 'Video After deleted successfully');
    }

    public function addVideoOn(Request $request)
    {
        $themeid = $request->themeid;

        // return $themeid;
        $video = $request->video;
        $template = Templatesetup::where('theme_id', $themeid)->first();
        // return $template;
        $previousVideo = json_decode($template->video, true);
        // $videoOn = [];
        // $videoOn['videoon'] = $video;
        $previousVideo['videoon'] = $video;
        // return print_r($previousvideo);


        // $previousvideo = $videoOn;
        // return $previousvideo;
        $vb = json_encode($previousVideo);
        $template->video = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Video On added successfully');
        }
    public function updateVideoOn(Request $request)
    {
        $themeid = $request->themeid;

        // return $themeid;
        $video = $request->video;
        $template = Templatesetup::where('theme_id', $themeid)->first();
        // return $template;
        $previousVideo = json_decode($template->video, true);
        // $videoOn = [];
        if (array_key_exists("videoon", $previousVideo)) {
            $previousVideo['videoon'] = $video;
            // return "exit";
        } else {
            $previousVideo['videoon'] = $video;
            // return "Not exist";
        }
        // $previousvideo = $videoOn;
        // return $previousvideo;
        $vb = json_encode($previousVideo);
        $template->video = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Video On updated successfully');
    }
    public function deleteVideoOn($themeid)
    {
        $template = Templatesetup::where('theme_id', $themeid)->first();
        $previousVideo = json_decode($template->video, true);

        if (array_key_exists("videoon", $previousVideo)) {
            unset($previousvideo['videoon']);
            // return "exit";
        }
        $vb = json_encode($previousVideo);
        $template->video = $vb;
        $template->update();
        return redirect()->back()->with('unsuccess', 'Video On deleted successfully');
    }
// image sliders
    public function adminAddImageSliders(Request $request){
        $themeid = $request->themeid;
        $template = Templatesetup::where('theme_id', $themeid)->first();

        $slider['image'] = $request->image;

        $previousContent = json_decode($template->image, true);

        if (isset($previousContent['sliders'])) {
            $totalSlider = count($previousContent['sliders']);
            $nextSlider = $totalSlider + 1;
            $previousContent['sliders'][$nextSlider] = $slider;
        } else {
            $totalSlider = 0;
            $previousContent['sliders'][$totalSlider] = $slider;
        }
        $vb = json_encode($previousContent);
        $template->image = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Slider Image added successfully');
    }
    public function deleteImageSlider($themeid, $index){
        $template = Templatesetup::where('theme_id', $themeid)->first();
        $previousContent = json_decode($template->image, true);
        if (array_key_exists($index, $previousContent['sliders'])) {
            unset($previousContent['sliders'][$index]);
            // return "Exist";
        }
        // return "not Exixt";
        $vb = json_encode($previousContent);
        $template->image = $vb;
        $template->update();
        return redirect()->back()->with('unsuccess', 'Slider Image deleted successfully');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(themeUpdateRequest $request, $id)
    {
        //
        $theme = Theme::where('id', $id)->firstOrFail();
        $oldDir = public_path("/themes/" . $theme->name . "/");
        $oldLayout = resource_path("/views/users/admin/template/" . $theme->name . "/");
        $theme->name = str_replace(" ", "_", $request->name);
        $theme->price = $request->price;
        $theme->category_id = $request->category;
        $theme->description = $request->description;
        $theme->status = $request->payment;
        $newDir = public_path("/themes/" . $theme->name . "/");
        $newLayout = resource_path("/views/users/admin/template/" . $theme->name . "/");
        rename($oldDir, $newDir);
        rename($oldLayout, $newLayout);

        // return $request->all();
        $theme->update();

        return redirect()->back()->with('success', $theme->name . " updated successfully");
    }
    public function activateTheme(Request $request)
    {
        $id = $request->id;
        $theme = Theme::find($id);
        // return $theme;
        $scriptUrl = $theme->getMedia('script')->first()->getUrl();
        // return $scriptUrl;
        $styleUrl = $theme->getMedia('style')->first()->getUrl();
        $interfaceUrl = $theme->getMedia('interface')->first()->getUrl();
        $previewUrl = $theme->getMedia('preview')->first()->getFullUrl();
        $zip = new ZipFile; //Zip::open($scriptUrl);

        // $scpriptZip->openFile(public_path($scriptUrl));
        $themName = $theme->name;
        // return $themName;
        $jsDir = public_path("/themes/" . $themName . "/js/");
        if (File::isDirectory($jsDir)) {
            File::deleteDirectory($jsDir);
            // echo "dirctory <br>";
        }
        if (!File::isDirectory($jsDir)) {
            File::makeDirectory($jsDir, 0777, true, true);
            // echo "dirctory <br>";
        }

        $cssDir = public_path("/themes/" . $themName . "/css/");
         if (File::isDirectory($cssDir)) {
            File::deleteDirectory($cssDir);
            // echo "dirctory <br>";
        }
        if (!File::isDirectory($cssDir)) {
            File::makeDirectory($cssDir, 0777, true, true);
            // echo "dirctory <br>";
        }

        // return $cssDir;
        //  return scandir($jsDir);
        $layoutDir = resource_path("/views/users/admin/template/" . $themName . "/");
        if (File::isDirectory($layoutDir)) {
            File::deleteDirectory($layoutDir);
            // echo "dirctory <br>";
        }
        if (!File::isDirectory($layoutDir)) {
            File::makeDirectory($layoutDir, 0777, true, true);
            // echo "dirctory <br>";
        }

        $zip->openFile(public_path($scriptUrl));
        $zip->extractTo($jsDir);
        $jsExtract = scandir($jsDir)[2];
        if (File::isDirectory($jsDir . $jsExtract)) {
            File::copyDirectory($jsDir . $jsExtract, $jsDir);
            File::deleteDirectory($jsDir . $jsExtract);
        }

        $zip->openFile(public_path($styleUrl));

        $zip->extractTo($cssDir);
        $cssExtract = scandir($cssDir)[2];
        if (File::isDirectory($cssDir . $cssExtract)) {
            File::copyDirectory($cssDir . $cssExtract, $cssDir);
            File::deleteDirectory($cssDir . $cssExtract);
        }
        $zip->openFile(public_path($interfaceUrl));
        $zip->extractTo($layoutDir);
        $layoutExtract = scandir($layoutDir)[2];
        if (File::isDirectory($layoutDir . $layoutExtract)) {
            File::copyDirectory($layoutDir . $layoutExtract, $layoutDir);
            File::deleteDirectory($layoutDir . $layoutExtract);
        }

        $theme->active = "enabled";
        $theme->update();

        return redirect()->back()->with('success', $themName . " activated successfullt");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function themeDisable($id)
    {
        $theme = Theme::find($id);
        $theme->active = "disabled";
        $theme->update();
        return redirect()->back()->with('success', $theme->name . " deactivated successfullt");


    }
    public function destroy($id)
    {
        //
        $theme = Theme::find($id);
        // return $file;
        $dir = public_path("/themes/" . $theme->name . "/");
        $layoutDir = resource_path("/views/users/admin/template/" . $theme->name);

        if (File::isDirectory($dir)) {
            File::deleteDirectory($dir);
        }
        if (File::isDirectory($layoutDir)) {
            File::deleteDirectory($layoutDir);
        }

       $theme->delete($id);

       $theme->clearMediaCollection();
        return redirect()->back()->with('success', 'File deleted successfully');
    }
}