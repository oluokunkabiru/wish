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
                        <h4><span class="fa fa-file-audio mx-3 bg-dark p-2 text-white rounded"></span> Audios Gallery</h4>

    </div>

    <div class="section-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success! </strong> {{ session('success') }}
            </div>
            @endif<div class="row">

    \
</div>

    <div class="container">

        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h4><span class="fa fa-file-audio mx-3 bg-dark p-2 text-white rounded"></span> Audios</h4> --}}
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
                                            <form  action="{{ route('media-gallery.destroy', $audio->first()->id) }}" method="post">
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



    </div>
    </div>
</section>
@endsection
@section('script')

@endsection


