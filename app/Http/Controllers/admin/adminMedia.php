<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\Conversions\ImageGenerators\Video;
use Spatie\MediaLibrary\MediaCollections\Models\Media as myMedia;


class adminMedia extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medias = File::with('media')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        // $medias = File::getMedia('image');
        // return $medias;
        // foreach($medias as $media){
        //     print_r($media->getMedia('image'));
        // }
        return view('users.admin.media.index', compact(['medias']));
    }

    public function photoGallery(){
                $medias = File::with('media')->where('user_id', Auth::user()->id)->get();
        return view('users.admin.media.photo', compact(['medias']));

    }
     public function videoGallery(){
                $medias = File::with('media')->where('user_id', Auth::user()->id)->get();
        return view('users.admin.media.video', compact(['medias']));

    }
     public function audioGallery(){
                $medias = File::with('media')->where('user_id', Auth::user()->id)->get();
        return view('users.admin.media.audio', compact(['medias']));

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
        $file = $request->file('file');
        $audio = ['mp3','rm', 'wma', 'aac', 'wav', 'wav','mpeg', '3gpp'];
        $video = ['flu', 'mp4','m3u8', 'ts', '3gp', 'mov', 'avi', 'wmv'];
        $imagetype = ['jpeg', 'png', 'gif', 'jpg', 'bmp', 'eps', 'raw', 'indd', 'ai', 'tiff'];
        $filetype = strtolower($file->getClientOriginalExtension());
        $files = explode(".", $file->getClientOriginalName());
        $media = new File();
        $collection = "default";
        if(in_array($filetype, $imagetype)){
            $collection = "image";
             $fileName = $files[0].'.png';
             $media->addMediaFromRequest('file')->usingFileName($fileName)->toMediaCollection($collection);
            $media->user_id = Auth::user()->id;
            $media->media_id =3;
            $media->save();
            // return $media->getMediaCollection()

        }elseif(in_array($filetype, $video)){
            $collection = "video";
            $fileName = $files[0].'.mp4';
             $media->addMediaFromRequest('file')->usingFileName($fileName)->toMediaCollection($collection);
            $media->user_id = Auth::user()->id;
            $media->media_id =3;
            $media->save();

        }elseif(in_array($filetype, $audio)){
            $collection = "audio";
            $fileName = $files[0].'.mp3';
             $media->addMediaFromRequest('file')->usingFileName($fileName)->toMediaCollection($collection);
            $media->user_id = Auth::user()->id;
            $media->media_id =3;
            $media->save();

        }else{
             $collection = "default";
             $media->addMediaFromRequest('file')->toMediaCollection($collection);
            $media->user_id = Auth::user()->id;
            $media->media_id =3;
            $media->save();
        }
        // return print_r($file);
        // $fileName =time().$file->getClientOriginalName();
        // $file->move('uploads/media/',$fileName);


        // $media->addMediaFromRequest('file')->toMediaCollection();
        // $media->user_id = Auth::user()->id;
        // $media->media_id =3;
        // $media->save();

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
        $file = File::find($id);
        $file->delete($id);
        $file->clearMediaCollection();
        return redirect()->back()->with('success', 'File deleted successfully');
    }
// public function downloadSingle(myMedia $media){
//     return $media;
// }
    public function downloadImage(File $file){
       $download=  $file->getMedia('image');
        return "hello";

    }
}