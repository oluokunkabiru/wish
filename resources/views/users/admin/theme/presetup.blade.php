@extends('users.admin.layout.app')
@section('title', 'Theme Preview preset up')
@section('style')
<style>
    .dataTables_empty{
        color: red;
        font-weight: bold;
    }
</style>
@section('content')
<section class="section">

 <div class="section-header">
        <h1>Theme Preset up</h1>
    </div>
    <div class="container">
        <div class="card">

            <div class="card-body">
                {{-- <div class="card-columns"> --}}
                              @if(session('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Added! </strong> {{ session('success') }}
                            </div>
                            @endif
                            @if(session('unsuccess'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Removed! </strong> {{ session('unsuccess') }}
                            </div>
                            @endif
                             @if($errors->any())

                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong style="font-size:20px;">Oops!
                                        {{ "Kindly rectify below errors" }}</strong><br />
                                    @foreach ($errors->all() as $error)
                                    {{$error }} <br />
                                    @endforeach
                                </div>
                                @endif
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Functionality</h3>
                                 <div class="card-body">
                                    <div class="form-group">
                                        @foreach ($functions as $function)
                                        <label class="custom-switch mt-2 d-block">
                                        <input type="checkbox" onclick="ok(this.id)" id="{{ route('addFunctionalityToThemeSetup', [$function->id, $theme->name, $theme->id, $function->name]) }}" name="function"
                                        @if (array_key_exists($function->id, $availablefunction))
                                                {{ "checked" }}
                                        @endif class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">{{ ucfirst($function->name) }}</span>
                                        </label>

                                        @endforeach

                                    </div>
                                    {{-- <button type="submit" class="btn btn-succcess">Update</button> --}}
                                </div>

                            {{-- </div> --}}
                        </div>
                        <div class="col-md-8">
                            <h3>Settings</h3>

                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-lg-4">
                                    @foreach ($availablefunction as $function)
                                    <div id="accordion">
                                        <div class="accordion">
                                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#{{ strtolower($function) }}" aria-expanded="true">
                                                <h4>{{ ucfirst($function) }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="col-md-8 col-sm-8 col-lg-8 ">

                                    <div class="card">
                                <div class="card-header">
                                    <h4>Preview</h4>
                                </div>
                                <div class="card-body">
                                    @if ($content)
                                    @php
                                        $carousel= $content->carousel;
                                    @endphp
                                     <table class="table table-striped table-condensed table-sm">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Image</th>
                                                    <th>Caption</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                        $carous = 1;
                                    @endphp

                                    @foreach ($carousel as $item)

                                                <tr>
                                                    <td>{{ $carous++ }}</td>
                                                    <td><img src="{{ $item->image }}" class="card-img rounded-circle" style="width: 30px" alt="{{ $item->caption }}"></td>
                                                    <td>{{ isset($item->caption)?$item->caption:"No caption" }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <a href="#" class="btn btn-sm btn-warning col m-1"> <span class="fa fa-edit"></span> </a>
                                                            <a href="#" class="btn btn-sm btn-danger col m-1"> <span class="fa fa-trash"></span> </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                    @endforeach
                                     </tbody>
                                        </table>
                                    @endif


                                        <a href="">
                                            <p></p>
                                        </a>
                                        <div class="accordion-body collapse show" id="writer" data-parent="#accordion">
                                        <button class="btn btn-success text-uppercase" id="addimage"><span class="fa fa-upload"></span> add image from media</a></button>
                                            <img src="#" class="card-img m-2" style="width: 200px" id="carouselImgPreview" alt="">
                                    <form action="{{ route('addCarouselSetup') }}" method="post">
                                        @csrf
                                     <div class="card-body">
                                    <div class="form-group">
                                        <label>Caption</label>
                                        <input type="text" name="caption" class="form-control">
                                    </div>
                                    <input type="hidden" name="image" value="{{ old('carousel') }}" id="carouselImg">
                                    <input type="hidden" name="themeid" value="{{ $theme->id }}" id="carouselImg">

                                     {{-- <div class="form-group row mb-4"> --}}
                                        <label class="">Description</label>
                                        <div class="form-group">
                                            <textarea class="summernote-simple" name="description" placeholder="Description"></textarea>
                                        </div>
                                    {{-- </div> --}}

                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    <button class="btn btn-secondary" type="reset">Reset</button>
                                </div>
                                                </form>
                                            </div>


                                </div>
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
<script>
    function ok(id) {
        // alert(id);
        window.location.assign(id);
    }


    let mediaBody =' <div class="card">';
                mediaBody +='<div class="card-header">';
                    mediaBody +='<h4>Image Check</h4>';
                           mediaBody +=' </div>';
                              mediaBody +='<div class="card-body">';
                                  mediaBody +=' <div class="form-group">';
                                      mediaBody +='<label class="form-label">Image Gallery</label>'
                                      mediaBody +='<div class="row gutters-sm">'
                                             mediaBody +='@foreach ($medias as $media)'
                                           mediaBody +='@php $image = $media->getMedia("image") @endphp'

                                                 mediaBody +='@if (count($image)!=null)';
                                            mediaBody +='<div class="col-6 col-sm-4">';
                                                mediaBody +='<label class="imagecheck mb-4">';
                                                mediaBody +='<input onclick="getImageLink(this.value)"  value="{{ url($image->first()->getUrl() )}}"  name="imagecheck" type="checkbox" class="imagecheck-input"  />';
                                                mediaBody +='<figure class="imagecheck-figure">';
                                                    mediaBody +='<img src="{{ url($image->first()->getUrl() )}}" alt="{{ $image->first()->name }}" style="height:150px" class="imagecheck-image img-fluid card-img">';
                                               mediaBody +='</figure>';
                                                mediaBody +='</label>';
                                            mediaBody +='</div> @endif';
                                mediaBody +='@endforeach';
                                        mediaBody +='</div>';
                                    mediaBody +='</div>';
                                mediaBody +='</div>';
                            mediaBody +='</div>';

    $("#addimage").fireModal({
        center: true,
        title:"Media gallery",
        body:mediaBody,
        size:'modal-lg',
        closeButton:true,
        modalId:'addimages',
        });

// $(".imagecheck-input").on('click', function() {
//    var ok = $(".imagecheck-input").val();
//    alert(ok);
// })

function getImageLink(image) {
    $("#carouselImgPreview").attr("src", image);
    $("#carouselImg").attr("value", image);
$("#addimages").modal("hide");
}



</script>

@endsection

