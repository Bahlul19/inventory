@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ url('update-category/'.$category->id) }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}">
            </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
</div>

@endsection