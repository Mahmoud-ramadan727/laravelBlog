<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
     public function index(){
         
        $posts=Post::with('User')->get();

        return view ('posts.index',[
            'posts' => $posts,

        ]);


     }

     public function create(){
         
        $users = User::all();

        return view('posts.create', [
            'users' => $users
        ]);


     }

     public function store(StorePostRequest $request)
     {  
        $post = new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->user_id=$request->user_id;
        $post->save();

        return redirect()->route('posts.index');
     }

     public function show(){
        $request =request()->post;
        $post=Post::find($request);
         
        $user=User::find($post->user_id);
        

        return view ('posts.show',[
            'post' => $post,
            'user' =>$user,

        ]);


     }

     public function edit(){
        $request =request()->post;
        $post=Post::find($request);
        $users = User::all();
        
        

        return view ('posts.edit',[
            'post' => $post,
            'users' =>$users,

        ]);


     }

     public function update(UpdatePostRequest $request)
     {
        $postId =$request->post;
        $post=Post::find($postId);
         
        $post->title=request()->title;
        $post->description=request()->description;
        $post->user_id=request()->user_id;
        $post->save();

        return redirect()->route('posts.index');
 
     }

     public function delete(){
        $postId =request()->post;
        $post=Post::find($postId);
         
        $post->delete();
        return redirect()->route('posts.index');
        

         


     }
}
