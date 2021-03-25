@extends('users.admin.layout.app')
@section('title', 'Add New Theme')
@section('style')
<style>
    .invalid-feedback{
        display: inline;
    }

    .dataTables_empty{
        color: red;
        font-weight: bold;
    }

</style>
@endsection
@section('content')
<section class="section">

 <div class="section-header">
        <h1>Create New Theme</h1>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Theme form</h4>
            </div>
            <div class="card-body">

                @if(session('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success! </strong> {{ session('success') }}
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

       <form action="{{ route('theme.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
           <div class="row">
               <div class="col">
                   <div class="form-group">
                        <label>Name</label>
                        <input type="text" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('name') }}</strong>
                        </span>
                     @endif
                    </div>

               </div>
                <div class="col">
                   <div class="form-group">
                        <label>Category</label>
                            <select class="form-control select2 {{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" >
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                                @endforeach

                            </select>
                             @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('name') }}</strong>
                        </span>
                     @endif
                    </div>

               </div>
           </div>
           <div class="row">
               <div class="col">
                   <div class="form-group">
                        <label>Style</label>
                        <input type="file"  accept=".zip" name="style" class="form-control-file border {{ $errors->has('style') ? ' is-invalid' : '' }}">

                        @if ($errors->has('style'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('style') }}</strong>
                        </span>
                     @endif
                    </div>

               </div>
                <div class="col">
                   <div class="form-group">
                        <label>Script</label>
                        <input type="file"  accept=".zip" class="form-control-file border {{ $errors->has('script') ? ' is-invalid' : '' }}" name="script" >

                        @if ($errors->has('script'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('script') }}</strong>
                        </span>
                     @endif
                    </div>

               </div>
           </div>

                      <div class="row">
               <div class="col">
                   <div class="form-group">
                        <label>Interface</label>
                        <input type="file" accept=".blade.php" name="interface" class="form-control-file border {{ $errors->has('interface') ? ' is-invalid' : '' }}">

                        @if ($errors->has('interface'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('interface') }}</strong>
                        </span>
                     @endif

                     @if (session('interface'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ session('interface') }}</strong>
                        </span>
                     @endif
                    </div>

               </div>
               <div class="col">
                   <div class="form-group">
                        <label>Preview</label>
                        <input type="file"  accept="image/*" name="preview" class="form-control-file border {{ $errors->has('preview') ? ' is-invalid' : '' }}">
                      @if ($errors->has('preview'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('preview') }}</strong>
                        </span>
                     @endif
                    </div>

               </div>


           </div>
           <div class="row">
               <div class="col">
                   <div class="form-group">
                        <label>Payment Status</label>
                            <select name="payment" class="form-control select2 {{ $errors->has('payment') ? ' is-invalid' : '' }}">
                               <option value="">Select Payment Status</option>
                                <option value="free">Free</option>
                                <option value="paid">Paid</option>
                            </select>
                            @if ($errors->has('payment'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('payment') }}</strong>
                        </span>
                     @endif
                    </div>

               </div>
               <div class="col">
                   <div class="form-group">
                        <label>Price</label>
                        <input type="number" value="{{ old('price') }}" name="price" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}">

                        @if ($errors->has('price'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('price') }}</strong>
                        </span>
                     @endif
                    </div>

               </div>

           </div>
           <div class="row">
               <div class="col">
                   <div class="form-group mb-0">
                        <label>Description</label>
                        <textarea name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" >{{ old('description') }}</textarea>

                        @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('description') }}</strong>
                        </span>
                     @endif
                    </div>

               </div>
           </div>

          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
         </form>
        </div>
    </div>
</section>
@endsection


