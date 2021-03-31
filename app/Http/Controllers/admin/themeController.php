<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\themeRequest;
use App\Http\Requests\themeUpdateRequest;
use App\Models\Category;
use App\Models\Functionality;
use App\Models\Theme;
use App\Models\Templatesetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
        $theme->save();
        $dir = public_path("/themes/" . $theme->name . "/");
        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0777, true, true);
            // echo "dirctory <br>";
        }
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

    public function presetup($id){
        $functions = Functionality::get();
        $theme = Theme::find($id);
        $template = Templatesetup::where('theme_id', $id)->first();
        $availablefunction = json_decode($template->functionality, true);
        return view('users.admin.theme.presetup', compact(['functions', 'theme', 'availablefunction' ]));
    }
    public function addFunction($functionid, $themename, $themeid, $functionname){
        $template = Templatesetup::where('theme_id', $themeid)->first();
        $previousFunction = json_decode($template->functionality, true);
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