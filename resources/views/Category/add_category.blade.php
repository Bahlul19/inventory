@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-sm" style="float: center">Add New Category</a>
                <a href="" data-toggle="modal" data-target="#exampleModalPost" class="btn btn-primary btn-sm" style="float: right">Add New Post</a>
            </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('all.category') }}">All Categories</a>
                    <a href="{{ route('all.post') }}" style="float: right">All Posts</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
 @endif

 <div class="col-md-8">
 <form action="{{ url('add-category') }}" method="POST">
    @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
      <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
 </div>

@endsection 
    </div>
</div>

