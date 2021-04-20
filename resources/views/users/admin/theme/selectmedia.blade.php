

      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h3 class="modal-title">Account Activation Confirmation</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
              <h5>Are you sure you want to activate</h5>

                <div class="product-thumbnail">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ ucwords($user->name) }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="card-text">Email</h6>
                                    </div>
                                    <div class="col">
                                        <h6><strong>{{ $user->email }}</strong></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h6 class="card-text">Phone</h6>
                                    </div>
                                    <div class="col">
                                        <h6><strong>{{ $user->phone?$user->phone:"Not yet set" }}</strong></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h6 class="card-text">Country</h6>
                                    </div>
                                    <div class="col">
                                        <h6><strong>{{ $user->country?$user->country:"Not yet set" }}</strong></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h6 class="card-text">State</h6>
                                    </div>
                                    <div class="col">
                                        <h6><strong>{{ $user->state?$user->state:"Not yet set" }}</strong></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h6 class="card-text">City</h6>
                                    </div>
                                    <div class="col">
                                        <h6><strong>{{$user->city?$user->city:"Not yet set" }}</strong></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h6 class="card-text">Address</h6>
                                    </div>
                                    <div class="col">
                                        <h6><strong>{{ $user->address?$user->address:"Not yet set" }}</strong></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </a> --}}
                    <div class="col-md-4">


                <div class="card-body">
                  <!-- Product Description -->
                  <div class="product-desc text-center">
                    <form action="{{ route('admin.activate', $user->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="btn btn-success btn-lg">ACTIVATE</button>
                      </form>
                  </div>
                </div>
            </div>
        </div>


        </div>
        </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>


