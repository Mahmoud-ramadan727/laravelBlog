@extends('layouts.app')
<head><title>Posts</title></head>
@section('content')
<div class="container m-5">
<p class="text-center"><a href="{{route('posts.create')}} " class="btn btn-success mb-3">Create Post</a></p>
 
<table class="table mt-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
  @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->slug }}</td>
      <td>{{ $post->user ? $post->user->name : 'not exist'}}</td>
      <td>{{$post->created_at}}</td>
      <td><div class="row">  
        <div class="col-2"><a href="{{route('posts.show',['post' => $post->id])}}" class="btn btn-info">View</a>
        </div>
        <div class="col-2"><a href="{{route('posts.edit',['post' => $post->id])}}" class="btn btn-primary">edit</a>
        </div>
        <div class="col-2"><form method="POST"action="{{route('posts.show',['post' => $post->id])}}">
             @csrf @method('delete')<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this post ?')">Delete </button></form></div>

             


        </div></td>
    </tr>
 @endforeach
  </tbody>
</table>
</div>
 


@endsection


