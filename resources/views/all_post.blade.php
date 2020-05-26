@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Post Title</th>
            <th scope="col">Post Details</th>
            <th scope="col">Post Image</th>
          </tr>
        </thead>
        <tbody>
            @foreach($post as $posts)
          <tr>
          <th scope="row">{{ $posts->id }}</th>
          <td>{{ $posts->title }}</td>
          <td>{{ $posts->details }}</td>
          <td><img src="{{ URL::to($posts->image)}}" style="height: 70px; width: 100px"></td>
          <td>
          <a href="{{ URL::to('edit-post/'.$posts->id)}}" class="btn btn-info btn-sm">Edit</a>
          <a href="{{ URL::to('delete-post/'.$posts->id)}}" class="btn btn-danger btn-sm">Delete</a>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
    
@endsection