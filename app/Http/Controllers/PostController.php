<?php

namespace App\Http\Controllers;

use App\Models\Post;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        // show all post belongs to logged-in user
       // ! not good becuz it load all data (collection) nd then display all on the sametime
        // $posts = Post::get(); //get() is an elequoent method
        // !paginater is an great method
        
      
         //Eager Loading : data from the 2 tables like & user 
        $posts = Post::latest()->with('likes','user')->paginate(5);

        return view('pages.index', [
            'posts' => $posts
        ]);
    }


    public function storePost(Request $request){


        // ! Validate 

        $this->validate($request, [

            "body" => "required|max:1000",
            
        ]);

        // ! Store to DB and create a post

         $request->user()->posts()->create($request->only('body'));
        
        
        // ! Redirect

        return back();

    }

    public function destroy(Post $post){
     
         $this->authorize('delete', $post);
            $post->delete();
            return back();
       
        
    }
}
