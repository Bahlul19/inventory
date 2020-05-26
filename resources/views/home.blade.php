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
    </div>
</div>

<!--Modal for inserted here for category-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
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
    <form action="{{ url('add-category') }}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <!--Modal for inserted here for Post-->

<div class="modal fade" id="exampleModalPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
    <form action="{{ url('add-post') }}" method="post" enctype="multipart/form-data">
        @csrf

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Posts Title</label>
              <input type="text" name="title" class="form-control" placeholder="Post name" id="title" required data-validation-required-message="Please product name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea name="details" rows="5" class="form-control" placeholder="Post Details" id="details" required data-validation-required-message="Please enter a product details."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" name="image" class="form-control" placeholder="Post image" id="image">
            </div>
          </div>

          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </div>
        </form>
    </div>
  </div>
</div>

@endsection
