<?php

namespace App\Http\Controllers\API;
use App\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;


class PostController extends Controller
{
    public function index()
    {
        
        return PostResource::collection(
            Post::paginate()    
         
        );

    }

    public function show()
    {
        $post=request()->post;
        return new PostResource(Post::find($post));

    }

    public function store()
    {
        $request=request();
        $post = new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->user_id=$request->user_id;
        $post->save();
 
        return PostResource::collection(
            Post::all()
        );
    }
}
