@extends('users.admin.layout.app')
@section('title', 'Theme Preview preset up')
@section('style')
    <style>
        .dataTables_empty {
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
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Added! </strong> {{ session('success') }}
                        </div>
                    @endif
                    @if (session('unsuccess'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Removed! </strong> {{ session('unsuccess') }}
                        </div>
                    @endif
                    @if ($errors->any())

                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong style="font-size:20px;">Oops!
                                {{ 'Kindly rectify below errors' }}</strong><br />
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br />
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
                                            <input type="checkbox" onclick="ok(this.id)"
                                                id="{{ route('addFunctionalityToThemeSetup', [$function->id, $theme->name, $theme->id, $function->name]) }}"
                                                name="function" @if (array_key_exists($function->id, $availablefunction)) {{ 'checked' }} @endif
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{ ucfirst($function->name) }}</span>
                                        </label>

                                    @endforeach

                                </div>
                                {{-- <button type="submit" class="btn btn-succcess">Update</button> --}}
                            </div>

                        </div>
                        {{-- </div> --}}
                        <div class="col-md-8">
                            <h3>Settings</h3>

                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-lg-4">
                                    @foreach ($availablefunction as $function)
                                        <div id="accordion">
                                            <div class="accordion">
                                                <div class="accordion-header" role="button" data-toggle="collapse"
                                                    data-target="#{{ strtolower(str_replace(' ', '_', $function)) }}"
                                                    aria-expanded="true">
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

                                            <div class="accordion-body collapse" id="carousel" data-parent="#accordion">
                                                @if ($content)
                                                    @php
                                                        $carousel = $content->carousel;

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

                                                            @foreach ($carousel as $key => $item)


                                                                <tr>
                                                                    <td>{{ $carous++ }}</td>
                                                                    <td><img src="{{ $item->image }}"
                                                                            class="card-img rounded-circle"
                                                                            style="width: 30px"
                                                                            alt="{{ $item->caption }}"></td>

                                                                    <td>{{ isset($item->caption) ? $item->caption : 'No caption' }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="row">
                                                                            <a href="#updateCarousel"
                                                                                imgUrl="{{ $item->image }}"
                                                                                carouselId="{{ $key }}"
                                                                                caption="{{ $item->caption }}"
                                                                                desc="{!! $item->description !!}"
                                                                                data-toggle="modal"
                                                                                class="btn btn-sm btn-warning col m-1">
                                                                                <span class="fa fa-edit"></span> </a>
                                                                            <a href="#deleteCarousel"
                                                                                carouselDeleteUrl="{{ route('admindeleteCarouselSetup', [$theme->id, $key]) }}"
                                                                                data-toggle="modal"
                                                                                carouselDeleteImgUrl="{{ $item->image }}"
                                                                                class="btn btn-sm btn-danger col m-1"> <span
                                                                                    class="fa fa-trash"></span> </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                @endif

                                                <button class="btn btn-success text-uppercase" id="addimage"><span
                                                        class="fa fa-upload"></span> add image from media</a></button>
                                                <img src="#" class="card-img m-2" style="width: 200px"
                                                    id="carouselImgPreview" alt="">
                                                <form action="{{ route('templateAddCarouselSetup') }}" method="post">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Caption</label>
                                                            <input type="text" name="caption" class="form-control">
                                                        </div>
                                                        <input type="hidden" name="image" value="{{ old('carousel') }}"
                                                            id="carouselImg">
                                                        <input type="hidden" name="themeid" value="{{ $theme->id }}">

                                                        {{-- <div class="form-group row mb-4"> --}}
                                                        <label class="">Description</label>
                                                        <div class="form-group">
                                                            <textarea class="summernote-simple" name="description"
                                                                placeholder="Description"></textarea>
                                                        </div>
                                                        {{-- </div> --}}

                                                    </div>
                                                    <div class="card-footer text-right">
                                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                                        <button class="btn btn-secondary" type="reset">Reset</button>
                                                    </div>
                                                </form>
                                            </div>
                                            {{-- writer --}}
                                            <div class="accordion-body collapse" id="writer" data-parent="#accordion">
                                                @if ($content)
                                                    @php
                                                        $write = $content->writer;

                                                    @endphp
                                                    <table class="table table-striped table-condensed table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th>S/N</th>
                                                                <th>Writer</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $writ = 1;
                                                            @endphp

                                                            @foreach ($write as $key => $item)


                                                                <tr>
                                                                    <td>{{ $writ++ }}</td>
                                                                    <td>{{ isset($item->name) ? $item->name : 'No caption' }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="row">
                                                                            <a href="#updateWriter"
                                                                                writerId="{{ $key }}"
                                                                                writerContent="{{ $item->name }}"
                                                                                data-toggle="modal"
                                                                                class="btn btn-sm btn-warning col m-1">
                                                                                <span class="fa fa-edit"></span> </a>
                                                                            <a href="#deleteWriter"
                                                                                writerDeleteUrl="{{ route('admindeleteWriterSetup', [$theme->id, $key]) }}"
                                                                                writerDeleteContent="{{ $item->name }}"
                                                                                data-toggle="modal"
                                                                                class="btn btn-sm btn-danger col m-1"> <span
                                                                                    class="fa fa-trash"></span> </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                @endif

                                                <form action="{{ route('adminWriterSetup') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="themeid" value="{{ $theme->id }}">
                                                    <div class="form-group">
                                                        <label for="email">Writer:</label>
                                                        <input type="text" name="writer" value="{{ old('writer') }}"
                                                            class="form-control {{ $errors->has('writer') ? ' is-invalid' : '' }}">
                                                    </div>
                                                    @if ($errors->has('writer'))
                                                        <span class="invalid-feedback" role="alert" style="display:block">
                                                            <strong>{{ $errors->first('writer') }}</strong>
                                                        </span>
                                                    @endif

                                                    <button type="submit"
                                                        class="btn btn-success text-uppercase float-right mx-2">Add
                                                        writer</button>
                                                </form>
                                            </div>
                                            {{-- music --}}

                                            <div class="accordion-body collapse show" id="music_before"
                                                data-parent="#accordion">
                                                @if ($music)
                                                    @if (!empty($music['musicbefore']) )
                                                            <table class="table table-striped table-condensed table-sm">
                                                                    <thead>
                                                                        <tr>

                                                                            <th>Music</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                 <audio controls>
                                                                                    <source src="{{ $music['musicbefore'] }}" type="audio/mpeg">
                                                                                    Your browser does not support the audio element.
                                                                                    </audio>
                                                                            </td>
                                                                            <td>
                                                                                <div class="row">
                                                                            <a href="#updateCarousel"

                                                                                data-toggle="modal"
                                                                                class="btn btn-sm btn-warning col m-1">
                                                                                <span class="fa fa-edit"></span> </a>
                                                                            <a href="#deleteCarousel"
                                                                               
                                                                                class="btn btn-sm btn-danger col m-1"> <span
                                                                                    class="fa fa-trash"></span> </a>
                                                                        </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                            </table>
                                                    @else
                                                 <button class="btn btn-success text-uppercase" id="addMusicBefore"><span
                                                        class="fa fa-file-audio"></span> add music before</a></button>
                                                    <form action="{{ route('addMusicBefore') }}" id="musicBeforeForm" method="post">
                                                        @csrf
                                                            <input type="hidden" value="" id="musicbeforeValue" name="music">
                                                            <input type="hidden" name="themeid" value="{{ $theme->id }}">
                                                    </form>
                                                    @endif
                                                @endif


                                            </div>

                                        </div>
                                    </div>
                                    {{-- endcard --}}
                                </div>
                                {{-- end col --}}




                            </div>
                            {{-- end 8-col row --}}
                        </div>
                        {{-- end 8 col --}}
                        {{-- </div> --}}

                    </div>
                </div>
            </div>

            {{-- update carousel --}}

    </section>

    <div id="updateCarousel" class="modal">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">edit <span id="carouselUpdateCaption"></span></h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <button class="btn btn-success text-uppercase" id="updateimage"><span class="fa fa-upload"></span>
                            add image from media</a></button>
                        <img src="#" class="card-img m-2" style="width: 200px" id="carouselPreviousImgPreview" alt="">
                        <form action="{{ route('templateUpdateCarouselSetup') }}" method="post">
                            @csrf
                            @method("PATCH")
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Caption</label>
                                    <input type="text" id="previousCaption" name="caption" class="form-control">
                                </div>
                                <input type="hidden" name="image" value="{{ old('carousel') }}" id="previousCarouselImg">
                                <input type="hidden" name="themeid" value="{{ $theme->id }}">
                                <input type="hidden" id="carouselId" name="carouselId" value="#">

                                {{-- <div class="form-group row mb-4"> --}}
                                <label class="">Description</label>
                                <div class="form-group">
                                    <textarea id="carouselValue" class="updateCarouselSummernote" name="description"
                                        placeholder="Description">

                                                                    </textarea>
                                </div>
                                {{-- </div> --}}

                                <div class="card-foot text-right">
                                    <button class="btn btn-primary text-uppercase mr-1" type="submit">Update</button>
                                    <button class="btn btn-secondary" type="reset">Reset</button>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div id="deleteCarousel" class="modal">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase text-danger">confirm delete</h4>
                </div>
                <div class="modal-body">
                    <img src="" id="carouselDeleteImgage" style="width: 200px" class="card-img rounded" alt="">
                </div>
                <div class="modal-footer">
                    <a href="" id="deleteCarouselLink" class="btn btn-danger text-uppercase mx-3">delete carousel</a>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>



    <div id="updateWriter" class="modal">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase text-danger">edit</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('writerSetupUpdate') }}" method="POST">
                        @csrf
                        @method("PATCH")
                        <input type="hidden" name="themeid" value="{{ $theme->id }}">
                        <div class="form-group">
                            <label for="writer">Writer:</label>
                            <input type="text" id="writerUpdateID" name="writer" value="{{ old('writer') }}"
                                class="form-control {{ $errors->has('writer') ? ' is-invalid' : '' }}">
                        </div>
                        <input type="hidden" value="" name="writerid" id="writerid">
                        @if ($errors->has('writer'))
                            <span class="invalid-feedback" role="alert" style="display:block">
                                <strong>{{ $errors->first('writer') }}</strong>
                            </span>
                        @endif


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success text-uppercase float-right mx-2">update writer</button>

                    </form>
                </div>
            </div>

        </div>
    </div>


    <div id="deleteWriter" class="modal">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase text-danger">confirm delete</h4>
                </div>
                <h2 class="deleteWriterContent text-center"></h2>
                <div class="modal-footer">
                    <a href="" id="deleteWriterlLink" class="btn btn-danger text-uppercase mx-3">delete carousel</a>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


@endsection




@section('script')
    <script>
        function ok(id) {
            // alert(id);
            window.location.assign(id);
        }

        function medialBodyGallery(myfunction) {

            let mediaBody = ' <div class="card">';
            mediaBody += '<div class="card-header">';
            mediaBody += '<h4>Image Check</h4>';
            mediaBody += ' </div>';
            mediaBody += '<div class="card-body">';
            mediaBody += ' <div class="form-group">';
            mediaBody += '<label class="form-label">Image Gallery</label>'
            mediaBody += '<div class="row gutters-sm">'
            mediaBody += '@foreach ($medias as $media)'
            mediaBody += '@php $image = $media->getMedia("image") @endphp'

            mediaBody += '@if (count($image) != null)';
            mediaBody += '<div class="col-6 col-sm-4">';
            mediaBody += '<label class="imagecheck mb-4">';
            mediaBody +=
                '<input onclick="' + myfunction +
                '(this.value)"  value="{{ url($image->first()->getUrl()) }}"  name="imagecheck" type="checkbox" class="imagecheck-input"  />';
            mediaBody += '<figure class="imagecheck-figure">';
            mediaBody +=
                '<img src="{{ url($image->first()->getUrl()) }}" alt="{{ $image->first()->name }}" style="height:150px" class="imagecheck-image img-fluid card-img">';
            mediaBody += '</figure>';
            mediaBody += '</label>';
            mediaBody += '</div> @endif';
            mediaBody += '@endforeach';
            mediaBody += '</div>';
            mediaBody += '</div>';
            mediaBody += '</div>';
            mediaBody += '</div>';
            return mediaBody;
        }

        function musicBodyGallery(myfunction) {

            let mediaBody = ' <div class="card">';
            mediaBody += '<div class="card-header">';
            mediaBody += '<h4>Check Music</h4>';
            mediaBody += ' </div>';
            mediaBody += '<div class="card-body">';
            mediaBody += ' <div class="form-group">';
            mediaBody += '<label class="form-label">Image Gallery</label>'
            mediaBody += '<div class="row gutters-sm">'
            mediaBody += '@foreach ($medias as $media)'
            mediaBody += '@php $audio = $media->getMedia("audio") @endphp'

            mediaBody += '@if (count($audio) != null)';
            mediaBody += '<div class="col-6 col-sm-4">';
            mediaBody += '<label class="imagecheck mb-4">';
            mediaBody +=
                '<input onclick="' + myfunction +
                '(this.value)"  value="{{ url($audio->first()->getUrl()) }}"  name="imagecheck" type="checkbox" class="imagecheinput"  />';
            mediaBody += '<figure class="imagecheck-figure">';
            mediaBody += '<audio class="w-100" height="200" controls>';
            mediaBody +=
            '<source src="{{ url($audio->first()->getUrl()) }}" type="{{ $audio->first()->mime_type }}">';
            mediaBody += 'Your browser does not support the audio element.';
            mediaBody += '</audio>';
            mediaBody += '</figure>';
            mediaBody += '</label>';
            mediaBody += '</div> @endif';
            mediaBody += '@endforeach';
            mediaBody += '</div>';
            mediaBody += '</div>';
            mediaBody += '</div>';
            mediaBody += '</div>';
            return mediaBody;
        }

        function videoBodyGallery(myfunction) {

            let mediaBody = ' <div class="card">';
            mediaBody += '<div class="card-header">';
            mediaBody += '<h4>Check Music</h4>';
            mediaBody += ' </div>';
            mediaBody += '<div class="card-body">';
            mediaBody += ' <div class="form-group">';
            mediaBody += '<label class="form-label">Image Gallery</label>'
            mediaBody += '<div class="row gutters-sm">'
            mediaBody += '@foreach ($medias as $media)'
            mediaBody += '@php $video = $media->getMedia("video") @endphp'

            mediaBody += '@if (count($video) != null)';
            mediaBody += '<div class="col-6 col-sm-4">';
            mediaBody += '<label class="imagecheck mb-4">';
            mediaBody +=
                '<input onclick="' + myfunction +
                '(this.value)"  value="{{ url($video->first()->getUrl()) }}"  name="imagecheck" type="checkbox" class="imagecheinput"  />';
            mediaBody += '<figure class="imagecheck-figure">';
            mediaBody += '<video class="w-100" height="200" controls>';
            mediaBody +=
            '<source src="{{ url($video->first()->getUrl()) }}" type="{{ $video->first()->mime_type }}">';
            mediaBody += 'Your browser does not support the video element.';
            mediaBody += '</video>';
            mediaBody += '</figure>';
            mediaBody += '</label>';
            mediaBody += '</div> @endif';
            mediaBody += '@endforeach';
            mediaBody += '</div>';
            mediaBody += '</div>';
            mediaBody += '</div>';
            mediaBody += '</div>';
            return mediaBody;
        }

        function addMusicBefore(music) {
            $("#musicbeforeValue").val(music);
            $("#musicBeforeForm").submit();
            $("#addMusicBefores").modal("hide");
        }

        function addCarouselImage(image) {
            $("#carouselImgPreview").attr("src", image);
            $("#carouselImg").attr("value", image);
            $("#addimages").modal("hide");
        }

        function updateCarouselImage(image) {
            $("#carouselPreviousImgPreview").attr("src", image);
            $("#previousCarouselImg").attr("value", image);
            $("#updateimages").modal("hide");
        }

        $("#addimage").fireModal({
            center: true,
            title: "Media gallery",
            body: medialBodyGallery("addCarouselImage"),
            size: 'modal-lg',
            closeButton: true,
            modalId: 'addimages',
        });

        $("#addMusicBefore").fireModal({
            center: true,
            title: "Music gallery",
            body: musicBodyGallery("addMusicBefore"),
            size: 'modal-lg',
            closeButton: true,
            modalId: 'addMusicBefores',
        });

        $("#updateimage").fireModal({
            center: true,
            title: "Media gallery update",
            body: medialBodyGallery("updateCarouselImage"),
            size: 'modal-lg',
            closeButton: true,
            modalId: 'updateimages',
        });

        $('#updateCarousel').on('show.bs.modal', function(e) {
            var img = $(e.relatedTarget).attr('imgUrl');
            var caption = $(e.relatedTarget).attr('caption');
            var desc = $(e.relatedTarget).attr('desc');
            var carouselId = $(e.relatedTarget).attr('carouselId');

            $("#carouselUpdateCaption").text(caption);
            $("#carouselPreviousImgPreview").attr('src', img);
            $("#previousCaption").val(caption);
            $("#previousCarouselImg").val(img);
            //   alert(img)
            $("#carouselId").val(carouselId);
            $("#carouselValue").html(desc);
            $(".updateCarouselSummernote").summernote({
                dialogsInBody: true,
                minHeight: 150,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['para', ['paragraph']]
                ]
            });

        })



        $('#deleteCarousel').on('show.bs.modal', function(e) {
            var carouselDelete = $(e.relatedTarget).attr('carouselDeleteUrl');
            var deleteImage = $(e.relatedTarget).attr('carouselDeleteImgUrl');
            $("#carouselDeleteImgage").attr('src', deleteImage);
            $("#deleteCarouselLink").attr('href', carouselDelete);
        })


        $('#updateWriter').on('show.bs.modal', function(e) {
            var writerContent = $(e.relatedTarget).attr('writerContent');
            // var writerUpdateUrl = $(e.relatedTarget).attr('writerUpdateUrl');
            var writerId = $(e.relatedTarget).attr('writerId');
            $("#writerUpdateID").val(writerContent);
            $("#writerid").val(writerId);
            //    alert(writerContent);
        })


        $('#deleteWriter').on('show.bs.modal', function(e) {
            var writerDeleteUrl = $(e.relatedTarget).attr('writerDeleteUrl');
            var writerDeleteContent = $(e.relatedTarget).attr('writerDeleteContent');
            $(".deleteWriterContent").text(writerDeleteContent);
            $("#deleteWriterlLink").attr('href', writerDeleteUrl);
        })

    </script>







@endsection
