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
                        </div>
                    </div>

                 {{-- </div> --}}


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





</script>

@endsection

