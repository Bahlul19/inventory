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
                      <th>Experience</th>
                      <th>Photo</th>
                      <th>Salary</th>
                      <th>Vacation</th>
                      <th>City</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($employee as $employees)
                    <tr>
                      <th scope="row">{{ $employees->id }}</th>
                    <td>{{ $employees->name }}</td>
                    <td>{{ $employees->email }}</td>
                    <td>{{ $employees->phone }}</td>
                    <td>{{ $employees->address }}</td>
                    <td>{{ $employees->experience }}</td>
                    <td><img src="{{ URL::to($employees->photo)}}" style="height: 70px; width: 100px"></td>
                    <td>{{ $employees->salary }}</td>
                    <td>{{ $employees->vacation }}</td>
                    <td>{{ $employees->city }}</td>
                    </tr>
                        @endforeach

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