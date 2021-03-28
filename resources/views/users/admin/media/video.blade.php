@extends('users.admin.layout.app')
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
                        <h4><span class="fa fa-file-video mx-3 bg-dark p-2 text-white rounded"></span> Videos Gallery</h4>

    </div>

    <div class="section-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success! </strong> {{ session('success') }}
            </div>
            @endif<div class="row">


</div>

    <div class="container">
        {{-- <h2><span class="fa fa-file-image mx-3 bg-dark p-2 text-white rounded"></span> Gallery</h2> --}}

        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h4><span class="fa fa-file-video mx-3 bg-dark p-2 text-white rounded"></span> Videos</h4> --}}
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
                                            <form  action="{{ route('media-gallery.destroy', $video->first()->id) }}" method="post">
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







    </div>
    </div>
</section>
@endsection
@section('script')

@endsection


