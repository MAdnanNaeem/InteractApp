
{{-- defining Props --}}

@props(['post' => $post])

     <div class="mb-1">
                  <div class="d-flex justify-content-start mb-2">
                     <a href="{{ route('users.posts',$post->user) }}" class="text-decoration-none fw-bold fs-5 text-dark">{{ $post->user->name }}</a> <span class="text-secondary fw-normal fs-6 pt-1 ms-2">{{ $post->created_at->diffForHumans() }}</span> 
                  </div>
                   <div style="text-align:justify;"                          class="d-flex justify-content-start">
                    <p style="font-size: 13pt;" class="mb-2">{{ $post->body }}</p>
                  </div> 
             </div> 

{{-- Delete --}}


           
             <div class="d-flex align-items-center fs-6 mb-2">
              @can('delete',$post)
        
               <form action="{{ route('posts.destroy', $post) }}" method="post">
                   @csrf
                   @method('DELETE')    
                    <button style="background-color: white; border:none;" type="submit" class="text-primary">Delete</button>
                </form>
            @endcan
               </div>
            






             <div class="d-flex align-items-center fs-6 mb-4">
           
               @auth
                   
               @if (! $post->checkLiked(auth()->user()))
                
               <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                  
                   @csrf
                   <button style="background-color: white; border:none;" type="submit" class="text-primary">Like</button>
                </form>
                  
                @else
                  
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                   @csrf
                   {{-- Method Spoofing  --}}
                   @method('DELETE')
                   <button style="background-color: white; border:none;" type="submit" class="text-primary">Unlike</button>
                </form>
                                  
                 @endif
                    @endauth
                

                <span>
                   {{ $post->Likes->count() }} {{ Str::plural('like', $post->Likes->count()) }}
                </span>
             </div>
