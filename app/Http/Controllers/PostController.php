<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function  index()
   {
       return view('posts.index');
   }

   public  function  store(Request $request )
   {
       $this->validate($request,[
           'body'=>'required'
       ]);


       $request->user()->posts()->create($request->only('body'));
       return back();
      // Post::Create([
      //     'user_id'=>auth()->user()-id(),
       //    'body'=>$request->body
      // ]);

   }
}
