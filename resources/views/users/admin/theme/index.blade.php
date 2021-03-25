@extends('users.admin.layout.app')
@section('title', 'Manage Theme')
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
        <h1>Manage Theme</h1>
    </div>

 <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('theme.create') }}" class="btn btn-success text-uppercase">add new theme</a>
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

                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="table-1">
                                            <thead>
                                                <tr>
                                                <th class="text-center">
                                                    ID
                                                </th>
                                                <th>Name</th>
                                                <th>Create by</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>price</th>
                                                <th>Active status</th>
                                                <th>Created date</th>
                                                <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @if ($themies)
                                                    @foreach ($themies as $theme)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ ucwords($theme->name) }}</td>
                                                            <td>{{ ucwords($theme->user->name) }}</td>
                                                            <td>{{ ucwords($theme->category->name) }}</td>
                                                            <td>{{ ucwords($theme->status) }}</td>
                                                            <td>{{ ucwords($theme->price) }}</td>
                                                            <td>{{ ucwords($theme->active) }}</td>
                                                            <td>{{ $theme->created_at }}</td>
                                                            <td>
                                                                <div class="row">
                                                                   <a href="#activateTheme" data-toggle="modal" themeId="{{ $theme->id }}" activateurl="{{ route('activateTheme')  }}" activateTheme={{ ucwords($theme->name) }} class="badge badge-pill badge-success m-1"><span class="fa fa-key p-1 text-white"></span></a>
                                                                   <a href="#editTheme" data-toggle="modal"  categoryValue="{{ $theme->category_id }}" categoryName="{{ ucwords($theme->category->name) }}" paymentValue="{{ $theme->status }}" paymentName="{{ ucwords($theme->status) }}"
                                                                    nameValue="{{ old('name', $theme->name ) }}" priceValue="{{ old('price', $theme->price ) }}"  descriptionValue="{{ old('description', $theme->description ) }}"  editUrl="{{ route('theme.update', $theme->id)  }}"
                                                                     class="badge badge-pill badge-warning m-1"><span class="fa fa-edit p-1 text-white"></span></a>
                                                                    <a href="#deleteTheme"  data-toggle="modal" delurl="{{ route('theme.destroy', $theme->id)  }}" delTheme={{ ucwords($theme->name) }}  class="badge badge-pill badge-danger m-1"><span class="fa fa-trash p-1 text-white"></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
            </div>


        </div>





 </div>


</section>
<div class="modal" id="deleteTheme">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">are sure you want delete <span id="delname"></span></h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="delThemeform" action="#" method="POST">

                            {{ csrf_field() }}
                            @method("DELETE")
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                            <button  type="submit" class="btn btn-danger text-uppercase">delete</button>                </div>
        </form>
                </div>
            </div>
        </div>


        <div class="modal" id="activateTheme">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">are sure you want activate <span id="themeName"></span></h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="activateThemeform" action="#" method="POST">

                            {{ csrf_field() }}
                            <input type="hidden" id="themeValue" name="id" value="#">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                            <button  type="submit" class="btn btn-danger text-uppercase">activate</button>                </div>
        </form>
                </div>
            </div>
        </div>



        <div class="modal" id="editTheme">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">edit <span id="editThemeName"></span></h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="editThemeform" action="#" method="POST">

                            {{ csrf_field() }}
                            @method("PATCH")
                            <div class="row">
               <div class="col">
                   <div class="form-group">
                        <label>Name</label>
                        <input type="text" value="{{ old('name') }}" class="form-control name {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('name') }}</strong>
                        </span>
                     @endif
                    </div>

               </div>
                <div class="col">
                   <div class="form-group">
                        <label>Category</label><br>
                            <select class="form-control select2 {{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" >
                                <option selected id="categoryOp"></option>
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
                        <label>Payment Status</label><br>
                            <select name="payment" class="form-control select2 {{ $errors->has('payment') ? ' is-invalid' : '' }}">
                               <option id="paymentOp" selected value="">Payment Status</option>
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
                        <input type="number" id="priceValue" value="{{ old('price') }}" name="price" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}">

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
                        <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" >{{ old('description') }}</textarea>

                        @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('description') }}</strong>
                        </span>
                     @endif
                    </div>

               </div>
           </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                            <button  type="submit" class="btn btn-danger text-uppercase">activate</button>                </div>
        </form>
                </div>
            </div>
        </div>

@endsection
@section('script')
<script>
     $(document).ready(function(){

    $("#table-1").dataTable({
  "columnDefs": [
    { "sortable": false, "targets": [2,3] }
  ]
});
//  $('#editCategory').on('show.bs.modal', function(e){
//           var mycat = $(e.relatedTarget).attr('mycategory');
//           var url = $(e.relatedTarget).attr('myurl');
//         $("#catname").text(mycat);
//           $("#editcategoryform").attr("action", url);

//      $("#categoryValue").val(mycat);
//      })


$('#deleteTheme').on('show.bs.modal', function(e){
          var mycat = $(e.relatedTarget).attr('delTheme');
          var url = $(e.relatedTarget).attr('delurl');
        $("#delname").text(mycat);
          $("#delThemeform").attr("action", url);

     })


     $('#activateTheme').on('show.bs.modal', function(e){
          var mycat = $(e.relatedTarget).attr('activateTheme');
          var url = $(e.relatedTarget).attr('activateurl');
          var id = $(e.relatedTarget).attr('themeId');
        $("#themeName").text(mycat);
        $("#themeValue").val(id);
          $("#activateThemeform").attr("action", url);

     })


       $('#editTheme').on('show.bs.modal', function(e){
          var nameValue = $(e.relatedTarget).attr('nameValue');
          var categoryValue = $(e.relatedTarget).attr('categoryValue');
          var categoryName = $(e.relatedTarget).attr('categoryName');
          var priceValue = $(e.relatedTarget).attr('priceValue');
          var paymentValue = $(e.relatedTarget).attr('paymentValue');
          var paymentName = $(e.relatedTarget).attr('paymentName');
          var descriptionValue = $(e.relatedTarget).attr('descriptionValue');
          var mycat = $(e.relatedTarget).attr('activateTheme');
          var url = $(e.relatedTarget).attr('editUrl');
          $("#editThemeName").text(nameValue);
          $(".name").val(nameValue);
          $("#categoryOp").val(categoryValue);
          $("#categoryOp").text(categoryName);
           $("#paymentOp").val(paymentValue);
           $("#priceValue").val(priceValue);
          $("#paymentOp").text(paymentName);
          $("#description").text(descriptionValue);
          $("#editThemeform").attr("action", url);

     })

     })
</script>
@endsection


