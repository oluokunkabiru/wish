<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarouselRequest;
use App\Http\Requests\DateRequest;
use App\Http\Requests\WriterRequest;
use App\Models\Category;
use App\Models\Template;
use App\Models\Templatesetup;
use App\Models\Theme;
use Illuminate\Http\Request;

class UsersThemeConroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('users.customers.wish.index');
    }
    public function listThemesCategory($id, $name){
        $category = Category::find($id);
        $themies = Theme::with(['user', 'category', 'media'])->where('category_id', $id)->orderBy('id', 'desc')->get();
        // return $themies;
        return view('users.customers.themes.view', compact(['themies', 'category']));
    }

  
    public function addCarousel(CarouselRequest $request)
    {

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $caption = [];
        $themeid = $request->themeid;
        $template = Template::where('id', $themeid)->first();

        $caption['image'] = $request->image;
        $caption['caption'] = $request->caption;
        $caption['description'] = test_input($request->description);

        $previousContent = !empty($template->content) ? json_decode($template->content, true) : [];

        if (isset($previousContent['carousel'])) {
            $totalCaption = count($previousContent['carousel']);
            $nextCaption = $totalCaption + 1;
            $previousContent['carousel'][$nextCaption] = $caption;
        } else {
            $totalCaption = 0;
            $previousContent['carousel'][$totalCaption] = $caption;
        }
        $vb = json_encode($previousContent);
        $template->content = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Carousel added successfully');
    }

    public function updateCarousel(CarouselRequest $request)
    {

        $caption = [];
        $themeid = $request->themeid;
        $carouselId = $request->carouselId;
        $template = Template::where('id', $themeid)->first();

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

        if (array_key_exists($carouselId, $previousContent['carousel'])) {
            $previousContent['carousel'][$carouselId] = $caption;
        } else {
            $previousContent['carousel'][$carouselId] = $caption;
        }
        $vb = json_encode($previousContent);
        $template->content = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Carousel updated successfully');
    }
    public function deleteCarousel($themeid, $carouselId)
    {
        $template = Template::where('id', $themeid)->first();
        $previousContent = json_decode($template->content, true);

        if (array_key_exists($carouselId, $previousContent['carousel'])) {
            unset($previousContent['carousel'][$carouselId]);
        }
        $vb = json_encode($previousContent);
        $template->content = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Carousel deleted successfully');
    }

    public function writerSetup(WriterRequest $request)
    {
        $writers = $request->writer;
        $themeid = $request->themeid;
        // return $themeid;
        $template = Template::where('id', $themeid)->first();
        $previousContent = !empty($template->content) ? json_decode($template->content, true) : [];
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
    public function adminDateSetup(DateRequest $request)
    {
        $date = $request->date;
        $themeid = $request->themeid;
        // return $themeid;
        // return $date;
        $template = Template::where('id', $themeid)->first();
        $template->date = $date;
        $template->update();
        return redirect()->back()->with('success', 'Date added successfully');
    }

    public function writerSetupUpdate(WriterRequest $request)
    {
        $themeid = $request->themeid;
        $writerid = $request->writerid;
        $writer = $request->writer;
        $writers = [];
        $template = Template::where('id', $themeid)->first();
        $writers['name'] = $writer;

        $previousContent = json_decode($template->content, true);

        if (array_key_exists($writerid, $previousContent['writer'])) {
            $previousContent['writer'][$writerid] = $writers;
        } else {
            $previousContent['writer'][$writerid] = $writers;
        }
        $vb = json_encode($previousContent);
        $template->content = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Writer updated successfully');
    }

    public function deleteWriter($themeid, $writerid)
    {
        $template = Template::where('id', $themeid)->first();
        $previousContent = json_decode($template->content, true);


        if (array_key_exists($writerid, $previousContent['writer'])) {
            unset($previousContent['writer'][$writerid]);
        }
        $vb = json_encode($previousContent);
        $template->content = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Carousel deleted successfully');
    }

    public function addMusicBefore(Request $request)
    {
        $themeid = $request->themeid;

        // return $themeid;
        $music = $request->music;
        $template = Template::where('id', $themeid)->first();
        // return $template;
        $previousMusic = !empty($template->music) ? json_decode($template->music, true) : [];
        // $musicBefore = [];
        // $musicBefore = $music;
        $previousMusic['musicbefore'] = $music;
        // return $previousMusic;
        $vb = json_encode($previousMusic);
        $template->music = $vb;
        $template->update();
        return redirect()->back()->with('success', 'Music before added successfully');
    }
    public function updateMusicBefore(Request $request)
    {
        $themeid = $request->themeid;

        // return $themeid;
        $music = $request->music;
        $template = Template::where('id', $themeid)->first();
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
    public function deleteMusicBefore($themeid)
    {
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
        $template = Template::where('id', $themeid)->first();
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
    public function adminAddImageSliders(Request $request)
    {
        $themeid = $request->themeid;
        $template = Template::where('id', $themeid)->first();

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
    public function deleteImageSlider($themeid, $index)
    {
        $template = Template::where('id', $themeid)->first();
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
   
    // public function userThemeSetup(){
        
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}