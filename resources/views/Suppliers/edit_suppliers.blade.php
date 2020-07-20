@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
          <a href="{{ route('all.employee') }}" class="btn btn-danger">View All Employee</a>
        </p>
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    <form action="{{ url('Suppliers.update_suppliers/'.$supplier->id) }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="control-group">

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $supplier->name }}" id="name" >
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email</label>
            <input type="text" name="email" class="form-control" value="{{ $supplier->email }}" id="email" >
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $supplier->phone }}" id="phone" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Address</label>
              <textarea name="address" rows="5" class="form-control" value="{{ $supplier->address }}" id="address"></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Photo</label>
              <input type="file" name="photo" class="form-control" id="photo"><br/>

            Old Image : <img src="{{ URL::to($supplier->photo) }}" style="hight: 40px; width: 100px">

            <input type="hidden" name="old_photo" value="{{ $supplier->photo }}">
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Account Holder</label>
            <input type="text" name="account_holder" class="form-control" value="{{ $supplier->account_holder }}" id="account_holder" >
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Accout Number</label>
            <input type="text" name="account_number" class="form-control" value="{{ $supplier->account_number }}" id="account_number" >
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Bank Name</label>
            <input type="text" name="bank_name" class="form-control" value="{{ $supplier->bank_name }}" id="bank_name" >
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Bank Brach</label>
            <input type="text" name="bank_branch" class="form-control" value="{{ $supplier->bank_branch }}" id="bank_branch" >
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Bank Name</label>
            <input type="text" name="bank_name" class="form-control" value="{{ $supplier->bank_name }}" id="bank_name" >
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>ShopName</label>
            <input type="text" name="shopname" class="form-control" value="{{ $supplier->shopname }}" id="shopname" >
              <p class="help-block text-danger"></p>
            </div>
        </div>

        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Area</label>
            <input type="text" name="area" class="form-control" value="{{ $supplier->area }}" id="area" >
              <p class="help-block text-danger"></p>
            </div>
        </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>City</label>
            <input type="text" name="city" class="form-control" value="{{ $supplier->city }}" id="city" >
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-success" id="sendMessageButton">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</div>

@endsection