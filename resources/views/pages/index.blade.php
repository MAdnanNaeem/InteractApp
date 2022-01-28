@extends('layouts.app')

@section('content')
   <div class="d-flex justify-content-center">
      <div style="width:50%;" class=" bg-white p-3 rounded-3 fs-3 text-center">

         <form action="{{ route('posts') }}" method="post" class="mb-4">
            @csrf

            @error('body')
              <div class=" fs-6 mb-2 badge bg-danger text-wrap" style="width: 30%; padding: 10px 0;">
            
                  {{ $message }}
               </div>
            @enderror


            
            <div class="mb-4 fs-6 form-group">

              <label for="body" class="visually-hidden">Boduy</label>
               <textarea  placeholder="Post something !" style="height: 140px" name="body" id="body" class="form-control p-2 mt-3 border-2 rounded-3 bg-light @error('body') border border-danger  @enderror" ></textarea>
            
            </div>

      
             <div class=" gap-2 mb-2">
                 <button style="width: 100px;" type="submit" class="btn btn-primary fs-5">Post</button>
               </div>
            
         </form>

      {{-- cout() method makes the data cleaner from the collection of posts --}}
         

      @if ($posts->count())
         @foreach ($posts as $post)
             <div class="mb-1">
                <div class="d-flex justify-content-start mb-2">
                 <a href="" class="text-decoration-none fw-bold fs-5 text-dark">{{ $post->user->name }}</a> <span class="text-secondary fw-normal fs-6 pt-1 ms-2">{{ $post->created_at->diffForHumans() }}</span> 
                 </div>
                 <div style="text-align:justify;" class="d-flex justify-content-start">
                 <p style="font-size: 13pt;" class="mb-2">{{ $post->body }}</p>
                 </div> 
             </div> 

             <div class="d-flex align-items-center fs-6 mb-4">
                <form action="" method="post" class="mr-1">
                   @csrf
                   <button style="background-color: white; border:none;" type="submit" class="text-primary">Like</button>
                </form>

                <form action="" method="post" class="mr-1">
                   @csrf
                   <button style="background-color: white; border:none;" type="submit" class="text-primary">Unlike</button>
                </form>

                <span>
                   {{ $post->Likes->count() }} {{ Str::plural('like', $post->Likes->count()) }}
                </span>
             </div>
         @endforeach
              
        <div  class="d-flex justify-content-end me-3 fs-6">
           {{ $posts->links() }}
        </div>
         
       
      @else
         <p>Break the ice by sending the first post to others !</p>
      @endif
         
     </div>
   </div>
@endsection