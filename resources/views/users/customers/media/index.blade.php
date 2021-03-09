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
/* .dz-progress {
	background-color: rgb(34, 206, 34) !important;;
} */
.dz-remove {
	color: red !important;;
}
.dropzone .dz-preview.dz-complete .dz-success-mark {
    opacity: 1;
}
.dropzone .dz-preview.dz-error .dz-success-mark {
    opacity: 0;
}
.dropzone .dz-preview .dz-error-message{
	top: 144px;
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
                        <h3 class="text-center">Upload Files here</h3>
                    </div>
                    <div class="dz-default dz-message">Drag and drop you file or click here to upload</div>

                </form>
            </div>
        </div>
        {{-- <button type="submit" class="float-right mr-5 mt-3 btn btn-rounded btn-success btn-lg" onsubmit="uploadFiles()">Upload</button> --}}

    </div>
</div>


        <div class="row">
            <div class="col-12 col-sm-12 col-lg-4">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Gallery</h4>
                            </div>
                            <div class="card-body">
                                <div class="gallery">
                                    <div class="gallery-item" data-image="assets/img/news/img01.jpg" data-title="Image 1"></div>
                                    <div class="gallery-item" data-image="assets/img/news/img02.jpg" data-title="Image 2"></div>
                                    <div class="gallery-item" data-image="assets/img/news/img03.jpg" data-title="Image 3"></div>
                                    <div class="gallery-item" data-image="assets/img/news/img04.jpg" data-title="Image 4"></div>
                                    <div class="gallery-item" data-image="assets/img/news/img05.jpg" data-title="Image 5"></div>
                                    <div class="gallery-item" data-image="assets/img/news/img06.jpg" data-title="Image 6"></div>
                                    <div class="gallery-item" data-image="assets/img/news/img07.jpg" data-title="Image 7"></div>
                                    <div class="gallery-item" data-image="assets/img/news/img08.jpg" data-title="Image 8"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Gallery</h4>
                            </div>
                            <div class="card-body">
                                <div class="gallery">
                                    <div class="gallery-item" data-image="assets/img/news/img05.jpg" data-title="Image 1"></div>
                                    <div class="gallery-item" data-image="assets/img/news/img08.jpg" data-title="Image 2"></div>
                                    <div class="gallery-item" data-image="assets/img/news/img04.jpg" data-title="Image 3"></div>
                                    <div class="gallery-item" data-image="assets/img/news/img11.jpg" data-title="Image 4"></div>
                                    <div class="gallery-item" data-image="assets/img/news/img02.jpg" data-title="Image 5"></div>
                                    <div class="gallery-item" data-image="assets/img/news/img05.jpg" data-title="Image 6"></div>
                                    <div class="gallery-item" data-image="assets/img/news/img03.jpg" data-title="Image 7"></div>
                                    <div class="gallery-item gallery-more" data-image="assets/img/news/img02.jpg" data-title="Image 8"><div>+2</div></div>
                                    <div class="gallery-item gallery-hide" data-image="assets/img/news/img11.jpg" data-title="Image 9"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Gallery <code>.gallery-md</code></h4>
                    </div>
                    <div class="card-body">
                        <div class="gallery gallery-md">
                            <div class="gallery-item" data-image="assets/img/news/img03.jpg" data-title="Image 1"></div>
                            <div class="gallery-item" data-image="assets/img/news/img14.jpg" data-title="Image 2"></div>
                            <div class="gallery-item" data-image="assets/img/news/img08.jpg" data-title="Image 3"></div>
                            <div class="gallery-item" data-image="assets/img/news/img05.jpg" data-title="Image 4"></div>
                            <div class="gallery-item" data-image="assets/img/news/img11.jpg" data-title="Image 5"></div>
                            <div class="gallery-item" data-image="assets/img/news/img09.jpg" data-title="Image 6"></div>
                            <div class="gallery-item" data-image="assets/img/news/img12.jpg" data-title="Image 8"></div>
                            <div class="gallery-item" data-image="assets/img/news/img13.jpg" data-title="Image 9"></div>
                            <div class="gallery-item" data-image="assets/img/news/img14.jpg" data-title="Image 10"></div>
                            <div class="gallery-item" data-image="assets/img/news/img15.jpg" data-title="Image 11"></div>
                            <div class="gallery-item gallery-more" data-image="assets/img/news/img08.jpg" data-title="Image 12"><div>+2</div></div>
                            <div class="gallery-item gallery-hide" data-image="assets/img/news/img01.jpg" data-title="Image 9"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Gallery <code>.gallery-fw</code></h4>
                    </div>
                    <div class="card-body">
                        <div class="gallery gallery-fw" data-item-height="100">
                            <div class="gallery-item" data-image="assets/img/news/img09.jpg" data-title="Image 1"></div>
                            <div class="gallery-item" data-image="assets/img/news/img10.jpg" data-title="Image 2"></div>
                            <div class="gallery-item gallery-more" data-image="assets/img/news/img08.jpg" data-title="Image 3"><div>+2</div></div>
                            <div class="gallery-item gallery-hide" data-image="assets/img/news/img01.jpg" data-title="Image 4"></div>
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
    acceptedFiles: 'image/*,video/*, audio/*',
    autoProcessQueue: true,
    createImageThumbnails: true,
    addRemoveLinks: true,
    uploadMultiple:true,
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


