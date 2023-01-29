<div>

<div>
    <div class="content-header">
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fa fa-check-circle mr-2"></i>Success!</strong> {{session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashbarod</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end mb-2">
                        <button wire:click.prevent="addNew" class="btn btn-primary"> <i class="fa fa-plus-circle mr-1"></i> Add New User</button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $user)
                                    <tr>

                                        <th scope="row">{{$key+$users->firstItem()}}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="" wire:click.prevent="edit({{$user}})"> 
                                                <i class="fa fa-edit mr-2"></i>
                                            </a>
                                            <a href="" wire:click.prevent="confirmation({{$user->id}})"> 
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog">
  <form wire:submit.prevent="{{$updateStatus ? 'updateUser' :'createUser'}}">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            @if($updateStatus)
                Edit User
            @else
                Add User
            @endif
            
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" wire:model.defer="state.name" placeholder="Enter Full Name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="emailHelp">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
                
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" wire:model.defer="state.email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp">

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" wire:model.defer="state.password" placeholder="Enter password" class="form-control @error('password') is-invalid @enderror" id="password">

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" wire:model.defer="state.password_confirmation" placeholder="Enter Confirm Password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmpassword">
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
        <button type="submit" class="btn btn-primary"> <i class="fas fa-save mr-1"></i>
        @if($updateStatus)
            Save Changes
        @else
            Save
        @endif
         
        
        </button>
      </div>

      </form>
    </div>
  </div>
</div>


<!--Delete Confirmation  Modal -->
<div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Are you sure you want to delete this user ?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="deleteUser"> <i class="fas fa-trash mr-1"></i>Delete</button></div>
    </div>
  </div>
</div>


</div>
