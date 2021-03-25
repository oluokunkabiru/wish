<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\themeRequest;
use App\Http\Requests\themeUpdateRequest;
use App\Models\Category;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use ZanySoft\Zip\Zip;

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
        // $script = $request->file('script');
        $theme->addMediaFromRequest('script')->toMediaCollection('script');
        $theme->addMediaFromRequest('style')->toMediaCollection('style');
        $theme->addMediaFromRequest('preview')->toMediaCollection('preview');
        $theme->addMediaFromRequest('interface')->toMediaCollection('interface');
        $theme->name = str_replace(" ", "_", $request->name);
        $theme->category_id = $request->category;
        $theme->status = $request->payment;
        $theme->price = $request->price;
        $theme->description = $request->description;
        $theme->user_id = Auth::user()->id;
        $theme->active = "disable";
        $theme->save();
         $dir = public_path("/themes/".$theme->name."/");
        if(! File::isDirectory($dir)){
            File::makeDirectory($dir, 0777, true, true);
            // echo "dirctory <br>";
        }
        return redirect()->route('theme.index')->with('success', "Theme upload successfully");


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
    public function update(themeUpdateRequest $request, $id)
    {
        //
        $theme = Theme::where('id', $id)->firstOrFail();
        $oldDir = public_path("/themes/".$theme->name."/");
        $theme->name = str_replace(" ", "_", $request->name);
        $theme->price = $request->price;
        $theme->category_id = $request->category;
        $theme->description = $request->description;
        $theme->status = $request->payment;
        $newDir = public_path("/themes/".$theme->name."/");

        rename($oldDir, $newDir);
        // return $request->all();
        $theme->update();

        return redirect()->back()->with('success', $theme->name." updated successfully");

    }
public function activateTheme(Request $request){
    $id = $request->id;
    $theme = Theme::with(['media'])->find($id);
    $scriptUrl = $theme->getMedia('script')->first()->getFullUrl();
    $styleUrl = $theme->getMedia('style')->first()->getFullUrl();
    $interfaceUrl = $theme->getMedia('interface')->first()->getFullUrl();
    $previewUrl = $theme->getMedia('preview')->first()->getFullUrl();
    $zip = Zip::open($scriptUrl);
    $themName = $theme->name;
    $dir = public_path("/themes/".$themName."/");
    if(! File::isDirectory($dir)){
        File::makeDirectory($dir, 0777, true, true);
        // echo "dirctory <br>";
    }
    $zip->extract($dir.'/js');

    echo $dir;
    // return
    // echo "$scriptUrl<br>$styleUrl<br>$interfaceUrl<br>$previewUrl";
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
        $theme = Theme::find($id);
        // return $file;
        $dir = public_path("/themes/".$theme->name."/");
        if(File::isDirectory($dir)){
        File::deleteDirectory($dir);
        // echo "dirctory <br>";
        // File::deleteDirectory()
    }
        $theme->delete($id);
        $theme->clearMediaCollection();
        return redirect()->back()->with('success', 'File deleted successfully');
    }
}
