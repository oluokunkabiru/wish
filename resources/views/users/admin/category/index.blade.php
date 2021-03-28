@extends('users.admin.layout.app')
@section('title', 'Manage Category')
@section('style')
<style>
    .dataTables_empty{
        color: red;
        font-weight: bold;
    }
</style>

@endsection
@section('content')
 <section class="section">
    <div class="section-header">
        <h1>Manage Category</h1>
    </div>

                    <div class="row">
                        <div class="col-12">
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

                            <div class="card">
                                <div class="card-header">
                                <a href="#addcategory" class="btn btn-success text-uppercase" data-toggle="modal">Add category</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="table-1">
                                            <thead>
                                                <tr>
                                                <th class="text-center">
                                                    ID
                                                </th>
                                                <th>Category</th>
                                                <th>Create</th>
                                                <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @if ($categories)
                                                    @foreach ($categories as $category)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ ucwords($category->name) }}</td>
                                                            <td>{{ $category->created_at }}</td>
                                                            <td>
                                                                <div class="row">
                                                                   <a href="#editCategory" data-toggle="modal" myurl="{{ route('category.update', $category->id)  }}" mycategory={{ ucwords($category->name) }} class="badge badge-pill badge-warning mx-1"><span class="fa fa-edit p-1 text-white"></span></a>
                                                                    <a href="#deleteCategory"  data-toggle="modal" delurl="{{ route('category.destroy', $category->id)  }}" delcategory={{ ucwords($category->name) }}  class="badge badge-pill badge-danger mx-1"><span class="fa fa-trash p-1 text-white"></span></a>
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
                    </div>



                </div>

            <div class="modal" id="addcategory">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">Add new category</h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="newcategory" action="{{ route('category.store') }}" method="POST">
                        <div class="form-group">
                            <label for="email">Category name:</label>
                            <input type="text" class="form-control" name="category" id="category">
                        </div>
                        <input type="hidden" name="id" id="catId">
                            {{ csrf_field() }}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                            <button id="addcategorybtn" type="submit" class="btn btn-primary text-uppercase">update</button>                </div>
</form>
                </div>
            </div>
            </div>



            <div class="modal" id="editCategory">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">edit <span id="catname"></span></h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="editcategoryform" action="{{ route('category.store') }}" method="POST">
                        <div class="form-group">
                            <label for="email">Category name:</label>
                            <input type="text" class="form-control" name="category" id="categoryValue">
                        </div>

                            {{ csrf_field() }}
                            @method("PUT")
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                            <button id="addcategorybtn" type="submit" class="btn btn-primary text-uppercase">add</button>                </div>
        </form>
                </div>
            </div>
            </div>

             <div class="modal" id="deleteCategory">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">are sure you want delete <span id="delname"></span></h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="delcategoryform" action="#" method="POST">

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
 </section>
@endsection

@section('script')
<script>
     $(document).ready(function(){
    $("#table-1").dataTable({
  "columnDefs": [
    { "sortable": false, "targets": [2,3] }
  ]
});
 $('#editCategory').on('show.bs.modal', function(e){
          var mycat = $(e.relatedTarget).attr('mycategory');
          var url = $(e.relatedTarget).attr('myurl');
        $("#catname").text(mycat);
          $("#editcategoryform").attr("action", url);

     $("#categoryValue").val(mycat);
     })


$('#deleteCategory').on('show.bs.modal', function(e){
          var mycat = $(e.relatedTarget).attr('delcategory');
          var url = $(e.relatedTarget).attr('delurl');
        $("#delname").text(mycat);
          $("#delcategoryform").attr("action", url);

     })

     })
</script>
@endsection
