<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FunctionalityRequest;
use App\Models\Functionality;
use Illuminate\Http\Request;

class FunctionalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $functions = Functionality::orderby('id', 'desc')->get();
        return view('users.admin.functionality.index',  compact(['functions']));
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
    public function store(FunctionalityRequest $request)
    {
        //
        $function = new Functionality;
        $function->name = $request->functionality;
        $function->save();
        return redirect()->back()->with('success', 'New fucationality have added successfully');
    //    return $request->all();

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
        $functionality = functionality::where('id', $id)->firstOrFail();
        $functionality->name = $request->functionality;
        $functionality->update();
        return redirect()->back()->with("success", "Functionality updated successfully");
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
        $functionality = functionality::where('id', $id)->firstOrFail();
        $functionality->forceDelete();
        return redirect()->back()->with("success", "Functionality delete successfully");

    }
}