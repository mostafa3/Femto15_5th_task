@extends('layouts.dashboard')


@section('title')
  <title>{{$supplier->name}}</title>
@endsection

@section('content')

  @include('inc.sidebar')

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
          <form action="{{action('SupplierController@destroy',['supplier'=>$supplier->id])}}" method="POST">
            @csrf
            <input type="hidden" name="id" id="id"/>
            <input type="hidden" name="_method" value="DELETE" />
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-modal">Close</button>
            <button type="submit" class="btn btn-danger" id="confirm-delete">Delete</button>
          </form>

        </div>
      </div>
    </div>
  </div>



    <div class='container'>
      <div class="">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{action('SupplierController@index')}}">Suppliers</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Supplier</li>
            </ol>
          </nav>
      </div>



    <form action="{{action('SupplierController@update',['supplier'=>$supplier->id])}}" method="POST">

      @csrf
      <input type="hidden" name='_method' value="PUT"/>

      <!-- Name Section -->
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Supplier Name</label>
         <div class="col-sm-10">
           <input type="text" id="name" name="name" value="{{ old('name') ?? $supplier->name }}" placeholder="Name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required/>
           @if ($errors->has('name'))
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('name') }}</strong>
               </span>
           @endif
         </div>
       </div>

       <!-- Email Section -->
       <div class="form-group row">
         <label for="email" class="col-sm-2 col-form-label">Supplier Email</label>
          <div class="col-sm-10">
            <input type="email" id="email" name="email" value="{{ old('email') ?? $supplier->email }}" placeholder="Email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required/>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
        </div>

        <!-- Phone Section -->
        <div class="form-group row">
          <label for="phone" class="col-sm-2 col-form-label">Supplier Phone</label>
           <div class="col-sm-10">
             <input type="text" id="phone" name="phone" value="{{ old('phone') ?? $supplier->phone }}" placeholder="Email" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" required/>
             @if ($errors->has('phone'))
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('phone') }}</strong>
                 </span>
             @endif
           </div>
         </div>

         <!-- information Section -->
         <div class="form-group row">
           <label for="information" class="col-sm-2 col-form-label">Additional information</label>
            <div class="col-sm-10">
              <textarea id="information" name="information"  placeholder="information" class="form-control" >{{ old('information') ?? $supplier->information }}</textarea>
            </div>
          </div>


         <button type="submit" class="btn btn-primary">Update</button>
         <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="delete({{$supplier->id}})">Delete </button>





    </form>




  </div> <!-- Container -->

@endsection
