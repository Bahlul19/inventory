@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
          <a href="{{ route('all.post') }}" class="btn btn-danger">List Posts</a>
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

    <form action="{{ url('update-post/'.$post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="control-group">

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Product Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}" id="title" required data-validation-required-message="Please product name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea name="details" rows="5" class="form-control" value="{{ $post->details }}" id="details"></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Product Image</label>
              <input type="file" name="image" class="form-control" id="image"><br/>

            Old Image : <img src="{{ URL::to($post->image) }}" style="hight: 40px; width: 100px">

            <input type="hidden" name="old_photo" value="{{ $post->image }}">
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
@endsection