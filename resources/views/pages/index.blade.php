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

              <label for="body" class="visually-hidden">Body</label>
               <textarea  placeholder="Post something !" style="height: 140px" name="body" id="body" class="form-control p-2 mt-3 border-2 rounded-3 bg-light @error('body') border border-danger  @enderror" ></textarea>
            
            </div>

      
             <div class=" gap-2 mb-2">
                 <button style="width: 100px;" type="submit" class="btn btn-primary fs-5">Post</button>
               </div>
            
         </form>

      {{-- cout() method makes the data cleaner from the collection of posts --}}
         

      @if ($posts->count())
         @foreach ($posts as $post)
            {{-- Component link with the parameter --}}
            <x-post :post="$post" />
         @endforeach
              
        <div  class="d-flex justify-content-end me-3 fs-6">
           {{ $posts->links() }}
        </div>
         
       
      @else
                 <p> <strong> {{ $user->name }} </strong> publish 📢 your first 🥇 post 📤 and Break the ice 🧊🔨!</p>
      @endif
         
     </div>
   </div>
@endsection