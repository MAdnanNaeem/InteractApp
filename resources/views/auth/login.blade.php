@extends('layouts.app')

@section('content')
   <div class="d-flex justify-content-center ">
          <div style="width:25%;" class=" bg-white p-3 rounded-3 fs-3 text-center">
            
           
            @if (session('status') )
            <div class=" fs-6 mb-4 badge bg-danger text-wrap" style="width: 100%; padding: 10px 0;">
           
            {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="post" >
            @csrf
               

               <div class="mb-4 fs-6">
                   <input style="width: 100%;" type="email" name="email" id="email" placeholder="Enter your email" class=" p-2 bg-light border-2 rounded-3 @error('email') border border-danger @enderror" value="{{ old('email') }}">
               
                  @error('email')
                   <div class="text-danger mt-2 text-sm">
                      {{ $message }}
                   </div>
                  @enderror
                  
               </div>

               <div class="mb-4 fs-6">
                 <label for="password" class="visually-hidden">Password</label>
                  <input style="width: 100%;" type="password" name="password" id="password" placeholder="Enter your password" class=" p-2 bg-light border-2 rounded-3 @error('password') border border-danger @enderror" value="">
                  
                  @error('password')
                   <div class="text-danger mt-2 text-sm">
                      {{ $message }}
                   </div>
                  @enderror
                  
               </div>
              
        
               <div class="d-grid gap-2">
                 <button type="submit" class="btn btn-primary">Login</button>
               </div>
            </form>
         
         </div>
   </div>
@endsection