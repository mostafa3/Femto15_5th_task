@extends('layouts.dashboard')


@section('title')
  <title>{{$inventory_manager->name}}</title>
@endsection

@section('content')

  @include('inc.sidebar')

@can('delete',$inventory_manager)
  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          This record will be permenantly deleted, Are you sure  ?
        </div>
        <div class="modal-footer">
          <form action="{{action('InventoryManagerController@destroy',['inventory_manager'=>$inventory_manager->id])}}" method="POST">
            @csrf

            <input type="hidden" name="_method" value="delete" />
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-modal">Close</button>
            <button type="submit" class="btn btn-danger" id="confirm-delete">Delete</button>
          </form>

        </div>
      </div>
    </div>
  </div>
@endcan


    <div class='container'>
      <div class="">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{action('InventoryManagerController@index')}}">Inventory Managers</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Manager</li>
            </ol>
          </nav>
      </div>



    <form action="{{action('InventoryManagerController@update',['inventory_manager'=>$inventory_manager->id])}}" method="POST">

      @csrf
      <input type="hidden" name='_method' value="PUT"/>

      <!-- Name Section -->
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Manager Name</label>
         <div class="col-sm-10">
           <input type="text" id="name" name="name" value="{{ old('name') ?? $inventory_manager->name }}" placeholder="Name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required/>
           @if ($errors->has('name'))
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('name') }}</strong>
               </span>
           @endif
         </div>
       </div>

       <!-- Email Section -->
       <div class="form-group row">
         <label for="email" class="col-sm-2 col-form-label">Manager Email</label>
          <div class="col-sm-10">
            <input type="email" id="email" name="email" value="{{ old('email') ?? $inventory_manager->email }}" placeholder="Email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required/>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
        </div>




        <!-- password section -->
        <div class="form-group">
          <div class="accordion" id="accordionExample">
            <div class="card">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Change password
              </button>
              <div id="collapseThree" class=" {{ $errors->has('password') ? '' : 'collapse' }}" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label ">Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="password" name="password">
                      @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="confirm_password" class="col-sm-3 col-form-label">Confirm password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="confirm_password" placeholder="confirm password" name="password_confirmation">
                      @if ($errors->has('password_confirmation'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password_confirmation') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

         <button type="submit" class="btn btn-primary">Update</button>
         @can('delete',$inventory_manager)
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="delete({{$inventory_manager->id}})">Delete </button>
         @endcan




    </form>




  </div> <!-- Container -->
@endsection
