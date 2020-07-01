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
                    <tr>
                      <th scope="row">{{ $customer->id }}</th>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->account_holder }}</td>
                    <td>{{ $customer->account_number }}</td>
                    <td>{{ $customer->bank_name }}</td>
                    <td>{{ $customer->bank_branch }}</td>
                    <td>{{ $customer->city }}</td>
                    </tr>
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