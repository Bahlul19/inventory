@extends('layouts.app')

@section('content')

<div class="container">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
    <form action="{{ url('update-category/'.$category->id) }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}">
            </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
</div>
        </div>
    </div>
</div>

@endsection