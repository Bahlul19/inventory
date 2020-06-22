@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Category Name</th>
          </tr>
        </thead>
        <tbody>
            @foreach($category as $categories)
          <tr>
          <th scope="row">{{ $categories->id }}</th>
          <td>{{ $categories->name }}</td>
          <td>
          <a href="{{ URL::to('edit-category/'.$categories->id)}}" class="btn btn-info btn-sm">Edit</a>
          <a href="{{ URL::to('delete-category/'.$categories->id)}}" class="btn btn-danger btn-sm">Delete</a>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
  </div>
</div>
    
@endsection