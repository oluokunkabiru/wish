<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersNewEventRequest;
use App\Models\Category;
use App\Models\Template;
use App\Models\Templatesetup;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\File as Files;


class UsersWishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::get();
        $events = Template::with(['category'])->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();

        return view('users.customers.wish.index', compact(['categories', 'events']));

    }
    public function userChooseTheme($eventid, $eventname, $catid, $catname){
        $category = Category::find($catid);
        $event = Template::where('id',$eventid)->firstOrFail();
        $themies = Theme::with(['user', 'category', 'media'])->where('category_id', $catid)->orderBy('id', 'desc')->get();
        return view('users.customers.wish.choose-theme', compact(['themies', 'category', 'event']));
    }
    
    public function setupChooseTheme($eventid, $eventname, $themeid, $catname){
        $template = Templatesetup::where('theme_id', $themeid)->first();
        $event = Template::where('id', $eventid)->first();
        $availablefunction = !empty($template->functionality) ? json_decode($template->functionality, true):[];
        $content = !empty($event->content)? json_decode($event->content, true):[];
        $music = !empty($event->music)? json_decode($event->music, true):[];
        $video = !empty($event->video)? json_decode($event->video, true):[];
        $images =  !empty($event->image)? json_decode($event->image, true):[];
        // $theme = Theme::find($themeid);

        // return prin($music);
        $medias = Files::with('media')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('users.customers.themes.presetup', compact(['music','event', 'template', 'video', 'images',  'content', 'medias', 'availablefunction']));
        
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::get();
        return view('users.customers.wish.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersNewEventRequest $request)
    {
        //
        $event = new Template;
        $event->name = $request->name;
        $event->date = $request->date;
        $event->user_id = Auth::user()->id;
        $event->description = $request->description;
        $event->category_id = $request->category;
        $event->status ="pending";
        $event->comment = "no";
        $event->save();
        return redirect(route('userswish.index'))->with('success', 'New event added successfully');
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