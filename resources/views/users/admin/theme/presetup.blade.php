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
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Functionality</h3>
                                 <div class="card-body">
                                    <div class="form-group">
                                        @foreach ($functions as $function)
                                        <label class="custom-switch mt-2 d-block">
                                        <input type="checkbox" onclick="ok(this.id)" id="{{ route('addFunctionalityToThemeSetup', $function->id) }}" name="function" class="custom-switch-input">
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
        window.location.a(id);
    }





</script>

@endsection

