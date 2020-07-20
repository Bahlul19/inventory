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
                      <th>Photo</th>
                      <th>Account Holder</th>
                      <th>Account Number</th>
                      <th>Bank Name</th>
                      <th>Bank Branch</th>
                      <th>Shopname</th>
                      <th>Area</th>
                      <th>City</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($supplier as $suppliers)
                    <tr>
                      <th scope="row">{{ $suppliers->id }}</th>
                    <td>{{ $suppliers->name }}</td>
                    <td>{{ $suppliers->email }}</td>
                    <td>{{ $suppliers->phone }}</td>
                    <td>{{ $suppliers->address }}</td>
                    <td><img src="{{ URL::to($suppliers->photo)}}" style="height: 70px; width: 100px"></td>
                    <td>{{ $suppliers->account_holder }}</td>
                    <td>{{ $suppliers->account_number }}</td>
                    <td>{{ $suppliers->bank_name }}</td>
                    <td>{{ $suppliers->bank_branch }}</td>
                    <td>{{ $suppliers->shopname }}</td>
                    <td>{{ $suppliers->area }}</td>
                    <td>{{ $suppliers->city }}</td>
                    <td>
                      <a href="{{ URL::to('Suppliers.edit_suppliers/'. $suppliers->id) }}" class="btn btn-info btn-sm">Edit</a>
                      <a href="{{ URL::to('Suppliers.delete_suppliers/'. $suppliers->id) }}" class="btn btn-danger btn-sm">Delete</a>
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