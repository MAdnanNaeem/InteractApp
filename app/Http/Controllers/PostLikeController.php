<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Likes;

use Illuminate\Http\Request;

class PostLikeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
        
    }

     public function store(Post $post, Request $request){
       
          if(! $post->checkLiked($request->user())){
            
               $post->likes()->create([
            
                'user_id' => $request->user()->id,
            ]);
                   return back();
          }else{
                   return back();
          }
     }

     public function destroy(Post $post, Request $request){
            
                 $request->user()->likes()->where('post_id', $post->id)->delete();
                  return back();
     }
}
