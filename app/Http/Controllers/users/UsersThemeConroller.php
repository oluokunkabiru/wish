<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Category;
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

    public function usersPreviewTheme($id){
        $theme = Theme::find($id);
        // return $theme->name;
        $template = Templatesetup::where('theme_id', $id)->first();
        $availablefunction = !empty($template->functionality) ? json_decode($template->functionality, true) : [];
        $content = json_decode($template->content);
        $music = json_decode($template->music, true);
        $video = json_decode($template->video, true);
        $images = json_decode($template->image, true);
        // return $images['sliders'][0]['image'];
        $date = $template->date;

        return view('users.admin.template.' . $theme->name . ".index", compact(['theme', 'images', 'content', 'music', 'video', 'music', 'date']));
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