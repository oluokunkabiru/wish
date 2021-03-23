@extends('users.admin.layout.app')
@section('title', 'Admin Media')
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
        <h1><span class="fa fa-file mx-3 bg-dark p-2 text-white rounded"></span> Gallery</h1>

    </div>

    <div class="section-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success! </strong> {{ session('success') }}
            </div>
            @endif
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
        <h2><span class="fa fa-file-image mx-3 bg-dark p-2 text-white rounded"></span> Gallery</h2>

        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Images</h4>
                        <a href="{{ route('downloadImage') }}" class="btn btn-success ml-auto">Download <span class="fa fa-download"></span></a>
                    </div>

                    <div class="card-body">
                        <div class="gallery gallery-fw" data-item-height="200">
                            <div class="row">
                                @foreach ($medias as $media)
                               @php
                                   $image = $media->getMedia('image');
                               @endphp
                               @if (count($image)!=null)
                                 {{-- <a href="{{ url($image->first()->getUrl() )}}">  {{ $image->first()->name }}</a>  <br> --}}
                                <div class="col-md-4 col-sm-12 ">
                                    {{-- <img src="{{ url($image->first()->getUrl() )}}" data-image="{{ url($image->first()->getUrl() )}}" data-title="{{ $image->first()->name }}"  alt="{{ $image->first()->name }}" class="card-img rounded gallery-item" style="height: 200px"> --}}
                                    <div class="gallery-item" style="height: 200px; float: none;" data-image="{{ url($image->first()->getUrl() )}}" data-title="{{ $image->first()->name }}">
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col ">
                                              <a href="{{ url($image->first()->getUrl() )}}" target="_blank" class="btn btn-success btn-rounded">View</a>
                                        </div>
                                         <div class="col ">
                                              <a href="{{url($image->first()->getUrl()) }}" download class="btn btn-primary btn-rounded"><span class="fa fa-download"></span></a>
                                        </div>
                                        <div class="col">
                                            <form  action="{{ route('admin-media-gallery.destroy', $image->first()->id) }}" method="post">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-rounded" type="submit">Delete</button>
                                             </form>
                                        </div>
                                    </div>


                                </div>



                                {{-- <div class="gallery-item col-md-3 col-lg-3 col-sm-12" data-image="{{ url($image->first()->getUrl() )}}" data-title="{{ $image->first()->name }}">




                                </div> --}}

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
                        <h4><span class="fa fa-file-video mx-3 bg-dark p-2 text-white rounded"></span> Videos</h4>
                    </div>

                    <div class="card-body">
                            <div class="row">
                                @foreach ($medias as $media)
                               @php
                                   $video = $media->getMedia('video');
                               @endphp
                               @if (count($video)!=null)
                                 {{-- <a href="{{ url($image->first()->getUrl() )}}">  mine = {{ $image->first()->mime_type }}</a>  <br> --}}

                                <div class="col-md-4 col-lg-3 col-sm-12 card" >
                                    <div class="card-header">
                                        <h6 class="card-title">{{ strlen($video->first()->name)>20?substr($video->first()->name, 0, 15)."..":$video->first()->name }}</h6>
                                    </div>
                                    {{-- <div class="card-body"> --}}
                                    <video class="w-100" height="200" controls>
                                        <source src="{{ url($video->first()->getUrl()) }}"  type="{{ $video->first()->mime_type }}">
                                        Your browser does not support the video tag.
                                        </video>
                                        {{-- </div> --}}
                                     <div class="row my-2">
                                        <div class="col ">
                                              <a href="{{ url($video->first()->getUrl() )}}" target="_blank" class="btn btn-success btn-rounded">View</a>
                                        </div>
                                        <div class="col">
                                            <form  action="{{ route('admin-media-gallery.destroy', $video->first()->id) }}" method="post">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-rounded" type="submit">Delete</button>
                                             </form>
                                        </div>
                                    </div>
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




        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4><span class="fa fa-file-audio mx-3 bg-dark p-2 text-white rounded"></span> Audios</h4>
                    </div>

                    <div class="card-body">
                        {{-- <div class="gallery gallery-fw" data-item-height="200"> --}}
                            <div class="row">
                                @foreach ($medias as $media)
                               @php
                                   $audio = $media->getMedia('audio');
                               @endphp
                               @if (count($audio)!=null)
                                 <a href="{{ url($audio->first()->getUrl() )}}">  {{ $audio->first()->name }}</a>  <br>

                                <div class="col-md-4 col-lg-3 col-sm-12 card" >
                                    <div class="card-header">
                                        <h6 class="card-title">{{ strlen($audio->first()->name)>20?substr($audio->first()->name, 0, 15)."..":$audio->first()->name }}</h6>

                                    </div>
                                    <audio class="w-100" height="200" controls>
                                        <source src="{{ url($audio->first()->getUrl()) }}" type="{{ $audio->first()->mime_type }}">
                                        Your browser does not support the audio element.
                                    </audio>
                                    <div class="row my-2">
                                        <div class="col ">
                                              <a href="{{ url($audio->first()->getUrl() )}}" target="_blank" class="btn btn-success btn-rounded">View</a>
                                        </div>
                                        <div class="col">
                                            <form  action="{{ route('admin-media-gallery.destroy', $audio->first()->id) }}" method="post">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-rounded" type="submit">Delete</button>
                                             </form>
                                        </div>
                                    </div>
                                </div>

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

                                <div class="col-md-4 col-lg-3 col-sm-12 card" >
                                    <div class="card-header">
                                        <h6 class="card-title">{{ strlen($default->first()->name)>20?substr($default->first()->name, 0, 15)."..":$default->first()->name }}</h6>

                                    </div>                                    <div class="row my-2">
                                        <div class="col ">
                                              <a href="{{ url($default->first()->getUrl() )}}" target="_blank" class="btn btn-success btn-rounded">View</a>
                                        </div>
                                        <div class="col">
                                            <form  action="{{ route('admin-media-gallery.destroy', $default->first()->id) }}" method="post">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-rounded" type="submit">Delete</button>
                                             </form>
                                        </div>
                                    </div>
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
    url: "{{ route('adminUploadMedia') }}",
    acceptedFiles: 'image/*,video/*, audio/*',
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


