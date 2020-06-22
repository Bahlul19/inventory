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
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($customer as $customers)
                    <tr>
                      <th scope="row">{{ $customers->id }}</th>
                    <td>{{ $customers->name }}</td>
                    <td>{{ $customers->email }}</td>
                    <td>{{ $customers->phone }}</td>
                    <td>{{ $customers->address }}</td>
                    <td>{{ $customers->account_holder }}</td>
                    <td>{{ $customers->account_number }}</td>
                    <td>{{ $customers->bank_name }}</td>
                    <td>{{ $customers->bank_branch }}</td>
                    <td>{{ $customers->city }}</td>
                    <td>
                      <a href="#" class="btn btn-info btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      <a href="#" class="btn btn-success btn-sm">View</a>
                    </td>
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