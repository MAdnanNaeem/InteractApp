@extends('layouts.app')

@section('content')
   <div class="d-flex justify-content-center">
          <div style="width:50%;" class=" bg-white p-3 rounded-3 fs-3 text-center">
           <div style="background-color: #e5f6e5"  class="mb-5"> 
          <h1 style="font-weight:bold; line-height:1.2; font-size: 24pt;" class="p-2 ">    {{ $user->name }}'s Posts</h1>
          <p class="fs-4"> <small> Posted {{ $posts->count() }} {{ Str::plural('post') }} and received {{ $user->totalLikes->count() }} {{ Str::plural('like') }}</small></p>
          
          </div>
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