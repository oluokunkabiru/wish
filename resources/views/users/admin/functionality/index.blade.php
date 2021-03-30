@extends('users.admin.layout.app')
@section('title', 'Manage functionality')
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
        <h1>Manage Functionality</h1>
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
                                <a href="#addfunctionality" class="btn btn-success text-uppercase" data-toggle="modal">Add functionality</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="table-1">
                                            <thead>
                                                <tr>
                                                <th class="text-center">
                                                    ID
                                                </th>
                                                <th>functionality</th>
                                                <th>Create</th>
                                                <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @if ($functions)
                                                    @foreach ($functions as $functionality)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ ucwords($functionality->name) }}</td>
                                                            <td>{{ $functionality->created_at }}</td>
                                                            <td>
                                                                <div class="row">
                                                                   <a href="#editfunctionality" data-toggle="modal" myurl="{{ route('functionality.update', $functionality->id)  }}" myfunctionality={{ ucwords($functionality->name) }} class="badge badge-pill badge-warning mx-1"><span class="fa fa-edit p-1 text-white"></span></a>
                                                                    <a href="#deletefunctionality"  data-toggle="modal" delurl="{{ route('functionality.destroy', $functionality->id)  }}" delfunctionality={{ ucwords($functionality->name) }}  class="badge badge-pill badge-danger mx-1"><span class="fa fa-trash p-1 text-white"></span></a>
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

            <div class="modal" id="addfunctionality">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">Add new functionality</h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="newfunctionality" action="{{ route('functionality.store') }}" method="POST">
                        <div class="form-group">
                            <label for="email">functionality name:</label>
                            <input type="text" class="form-control" name="functionality" id="functionality">
                        </div>
                            {{ csrf_field() }}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                            <button id="addfunctionalitybtn" type="submit" class="btn btn-primary text-uppercase">add</button>                </div>
</form>
                </div>
            </div>
            </div>



            <div class="modal" id="editfunctionality">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">edit <span id="catname"></span></h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="editfunctionalityform" action="{{ route('functionality.store') }}" method="POST">
                        <div class="form-group">
                            <label for="email">functionality name:</label>
                            <input type="text" class="form-control" name="functionality" id="functionalityValue">
                        </div>

                            {{ csrf_field() }}
                            @method("PUT")
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                            <button id="addfunctionalitybtn" type="submit" class="btn btn-primary text-uppercase">update</button>                </div>
        </form>
                </div>
            </div>
            </div>

             <div class="modal" id="deletefunctionality">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">are sure you want delete <span id="delname"></span></h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="delfunctionalityform" action="#" method="POST">

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
 $('#editfunctionality').on('show.bs.modal', function(e){
          var mycat = $(e.relatedTarget).attr('myfunctionality');
          var url = $(e.relatedTarget).attr('myurl');
        $("#catname").text(mycat);
          $("#editfunctionalityform").attr("action", url);

     $("#functionalityValue").val(mycat);
     })


$('#deletefunctionality').on('show.bs.modal', function(e){
          var mycat = $(e.relatedTarget).attr('delfunctionality');
          var url = $(e.relatedTarget).attr('delurl');
        $("#delname").text(mycat);
          $("#delfunctionalityform").attr("action", url);

     })

     })
</script>
@endsection
