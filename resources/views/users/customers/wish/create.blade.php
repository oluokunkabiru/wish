@extends('users.customers.layout.app')
@section('title', 'Manage Theme Preview')
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
            <h1 class="text-uppercase">Create new event wish</h1>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Event registration form</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('userswish.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md">
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
                <div class="col-md">
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
                            <div class="col-md">
                   <div class="form-group">
                        <label>Event date</label>
                        <input type="date" value="{{ old('date') }}" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" name="date">
                        @if ($errors->has('date'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('date') }}</strong>
                        </span>
                     @endif
                    </div>

               </div>
               <div class="col-md">
                   <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id=""class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" cols="30" rows="10">
                                {{ old('description') }}
                        </textarea>
                        @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('description') }}</strong>
                        </span>
                     @endif
                    </div>

               </div>
              
                        </div>
                        <button type="submit" class="btn btn-success btn-rounded text-uppercase float-right">create new event</button>
                    </form>
                </div>
            </div>

        </div>
    </section>

@endsection
