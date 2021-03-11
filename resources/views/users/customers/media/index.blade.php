@extends('users.customers.layout.app')
@section('title', 'Media')
@section('style')
<style>
.dz-image img {
    width: 100%;
    height: 100%;
}
.dropzone.dz-started .dz-message {
	display: block !important;
}
.dropzone {
	border: 2px dashed #028AF4 !important;;
}

.dz-remove {
	color: red !important;;
}




</style>

@endsection
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Gallery</h1>

    </div>

    <div class="section-body">
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>File Upload</h3>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" class="dropzone dz-clickable" id="image-upload">
                    @csrf
                    <div>
                        <h3 class="text-center">Upload Files here max of <b>50mb</b></h3>
                    </div>
                    <div class="dz-default dz-message">Drag and drop you file or click here to upload</div>

                </form>
            </div>
        </div>
        {{-- <button type="submit" class="float-right mr-5 mt-3 btn btn-rounded btn-success btn-lg" onsubmit="uploadFiles()">Upload</button> --}}

    </div>
</div>

    <div class="container">
        <h2>Gallery</h2>

        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Images</h4>
                    </div>

                    <div class="card-body">
                        <div class="gallery gallery-fw" data-item-height="200">
                            {{-- <div class="row"> --}}
                                @foreach ($medias as $media)
                               @php
                                   $image = $media->getMedia('image');
                               @endphp
                               @if (count($image)!=null)
                                 {{-- <a href="{{ url($image->first()->getUrl() )}}">  {{ $image->first()->name }}</a>  <br> --}}

                                <div class="gallery-item col-md-3 col-lg-3 col-sm-12" data-image="{{ url($image->first()->getUrl() )}}" data-title="{{ $image->first()->name }}"></div>
                               @endif

                                @endforeach
                            {{-- </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Videos</h4>
                    </div>

                    <div class="card-body">
                        <div class="gallery gallery-fw" data-item-height="200">
                            <div class="row">
                                @foreach ($medias as $media)
                               @php
                                   $video = $media->getMedia('video');
                               @endphp
                               @if (count($video)!=null)
                                 {{-- <a href="{{ url($image->first()->getUrl() )}}">  mine = {{ $image->first()->mime_type }}</a>  <br> --}}

                                <div class="col-md-4 col-lg-3 col-sm-12" >
                                    <video class="w-100" height="200" controls>
                                        <source src="{{ url($video->first()->getUrl()) }}"  type="{{ $video->first()->mime_type }}">
                                        Your browser does not support the video tag.
                                        </video>
                                </div>
                                {{-- @else
                                    <h3 class="text-center text-danger text-uppercase">No video available</h3> --}}
                               @endif

                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Audios</h4>
                    </div>

                    <div class="card-body">
                        <div class="gallery gallery-fw" data-item-height="200">
                            {{-- <div class="row"> --}}
                                @foreach ($medias as $media)
                               @php
                                   $audio = $media->getMedia('audio');
                               @endphp
                               @if (count($audio)!=null)
                                 <a href="{{ url($audio->first()->getUrl() )}}">  {{ $audio->first()->name }}</a>  <br>

                                <div class="col-md-4 col-lg-3 col-sm-12" >
                                    <audio class="w-100" height="200" controls>
                                        <source src="{{ url($audio->first()->getUrl()) }}" type="{{ $audio->first()->mime_type }}">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>

                               @endif

                                @endforeach
                            {{-- </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>


         <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Others files</h4>
                    </div>

                    <div class="card-body">
                        <div class="gallery gallery-fw" data-item-height="200">
                            {{-- <div class="row"> --}}
                                @foreach ($medias as $media)
                               @php
                                   $default = $media->getMedia('default');
                               @endphp
                               @if (count($default)!=null)

                                <div class="col-md-4 col-lg-3 col-sm-12" >
                                    <a href="{{ url($default->first()->getUrl() )}}">  {{ $default->first()->name }}</a>  <br>

                                </div>

                               @endif

                                @endforeach
                            {{-- </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
@section('script')
<script>
var dropzone = null;

Dropzone.autoDiscover = false;
dropzone = $("#image-upload").dropzone({
    // Dropzone.options.image-upload={
    url: "{{ route('useruploadmedia') }}",
    // acceptedFiles: 'image/*,video/*, audio/*',
    autoProcessQueue: true,
    createImageThumbnails: true,
    addRemoveLinks: true,
    // uploadMultiple:true,
    parallelChunkUploads:true,
    capture: 'image/*,video/*, audio/*',
    // dictDefaultMessage:function(){
    //     alert ('hello');
    // }
    // };
});

// function uploadFiles() {
//     dropzone.processQueue();
//     return false;
// }
</script>
@endsection


