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

    <form action="{{ url('Employee.update_employee/'.$employee->id) }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="control-group">

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $employee->name }}" id="name" >
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email</label>
            <input type="text" name="email" class="form-control" value="{{ $employee->email }}" id="email" >
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}" id="phone" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Address</label>
              <textarea name="address" rows="5" class="form-control" value="{{ $employee->address }}" id="address"></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Experience</label>
            <input type="text" name="experience" class="form-control" value="{{ $employee->experience }}" id="experience" >
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Photo</label>
              <input type="file" name="photo" class="form-control" id="photo"><br/>

            Old Image : <img src="{{ URL::to($employee->photo) }}" style="hight: 40px; width: 100px">

            <input type="hidden" name="old_photo" value="{{ $employee->photo }}">
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Salary</label>
            <input type="text" name="salary" class="form-control" value="{{ $employee->salary }}" id="salary" >
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Vacation</label>
            <input type="text" name="vacation" class="form-control" value="{{ $employee->vacation }}" id="vacation" >
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>City</label>
            <input type="text" name="city" class="form-control" value="{{ $employee->city }}" id="city" >
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