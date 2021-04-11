<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersNewEventRequest;
use App\Models\Category;
use App\Models\Template;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $events = Template::with(['category'])->where('user_id', Auth::user()->id)->get();

        return view('users.customers.wish.index', compact(['categories', 'events']));

    }
    public function userChooseTheme($eventid, $eventname, $catid, $catname){
        $category = Category::find($catid);
        $themies = Theme::with(['user', 'category', 'media'])->where('category_id', $catid)->orderBy('id', 'desc')->get();
        return view('users.customers.wish.choose-theme', compact(['themies', 'category']));
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