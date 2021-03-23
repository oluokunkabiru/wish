@extends('users.customers.layout.app')
@section('title', 'Photo Gallery')
@section('style')


@endsection
@section('content')

<section class="section">
    <div class="section-header">
        <h1><span class="fa fa-file-image mx-3 bg-dark p-2 text-white rounded"></span>  Photo Gallery</h1>

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
        {{-- <h2>Gallery</h2> --}}

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
                                            <form  action="{{ route('media-gallery.destroy', $image->first()->id) }}" method="post">
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













    </div>
    </div>
</section>
@endsection
@section('script')

@endsection


