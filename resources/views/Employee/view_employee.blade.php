@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>  
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>experience</th>
                      <th>Personal Photo</th>
                      <th>Salary</th>
                      <th>Vacation </th>
                      <th>City</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->experience }}</td>
                    <td><img src="{{ URL::to($employee->photo)}}" style="height: 70px; width: 100px"></td>
                    <td>{{ $employee->salary }}</td>
                    <td>{{ $employee->vacation }}</td>
                    <td>{{ $employee->city }}</td>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
      </div>
    </div>
</div>

@endsection()