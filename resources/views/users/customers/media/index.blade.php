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
.dz-progress {
	background-color: rgb(34, 206, 34) !important;;
}
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
    {{-- <div class="col-md-4"></div> --}}
    {{-- <div class="col-md-4 py-3"> --}}
        <form id="dropezone" method="post" enctype="multipart/form-data">
            <div id="dropzoneDiv" class="dropzone dz-clickable">
                <div class="dz-default dz-message">
                    <span>Drop files here to upload</span>
                </div>
             </div>
             <button type="submit" class="btn btn-rounded btn-success my-2 btn-lg">Upload</button>
        </form>

    {{-- </div> --}}
    {{-- <div class="col-md-4"></div> --}}
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
dropzone = $("#dropzoneDiv").dropzone({
    url: "/api/works/upload",
    acceptedFiles: 'image/*,video/*',
    autoProcessQueue: false,
    createImageThumbnails: true,
    addRemoveLinks: true
});

function submitForm() {
    dropzone.processQueue();
    return false;
}
</script>
@endsection


