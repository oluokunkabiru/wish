<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return "hello";
        return view('pages.index');
    }
    public function about(){
        return view('pages.about');
    }
    public function news(){
        return view('pages.news');
    }
    public function news_detail(){
        return view('pages.news-detail');
    }

    public function projects(){
        return view('pages.project');
    }
    public function project_details(){
        return view('pages.project-detail');
    }
    public function shop(){
        return view('pages.shop');
    }

    public function contact(){
        return view('pages.contact');
    }
    public function team(){
        return view('pages.team');
    }
    public function testimony(){
        return view('pages.testimony');
    }
    public function faq(){
        return view('pages.faq');
    }

    public function service(){
        return view('pages.service');
    }


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
