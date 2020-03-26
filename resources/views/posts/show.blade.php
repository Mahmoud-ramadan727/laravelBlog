@extends('layouts.app')

@section('content')
<div class="container">
<div class="card mb-5 ">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <span><b>Title:-  </b>{{$post->title}}</span><br>
       <b> Description:- </b><br>
       <h5>{{$post->description}}</h5>   
    </blockquote>
  </div>
  </div>
   

  <div class="card ">
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <span><b>Name:-  </b>{{$user->name}}</span><br>
      <span><b>Email:-  </b>{{$user->email}}</span><br>
      <span><b>Created At :-  </b>{{$user->created_at}}</span><br>
        
    </blockquote>
  </div>
  </div>
</div>


 


@endsection