@extends('layouts.app')

@section('content')
   <div class="d-flex justify-content-center ">
          <div style="width:25%;" class=" bg-white p-3 rounded-3 fs-3 text-center">
            
            <form action="{{ route('register') }}" method="POST" >
            @csrf
               <div class="mb-4 fs-6">
                   <input style="width: 100%;" type="text" name="name" id="name" placeholder="Your name" class="p-2  bg-light border-2 rounded-3  @error('name') border border-danger @enderror" value="{{ old('name') }}">

                   @error('name')
                   <div class="text-danger mt-2 text-sm">
                         {{ $message }}
                   </div>
                   @enderror

               </div>

               <div class="mb-4 fs-6">
                 
                  <input style="width: 100%;" type="text" name="username" id="username" placeholder="Username" class=" p-2 bg-light border-2 rounded-3 @error('username') border border-danger @enderror" value="{{ old('username') }}">

                  @error('username')
                   <div class="text-danger mt-2 text-sm">
                      {{ $message }}
                   </div>
                  @enderror

               </div>

               <div class="mb-4 fs-6">
                   <input style="width: 100%;" type="email" name="email" id="email" placeholder="Email" class=" p-2 bg-light border-2 rounded-3 @error('email') border border-danger @enderror" value="{{ old('email') }}">
               
                  @error('email')
                   <div class="text-danger mt-2 text-sm">
                      {{ $message }}
                   </div>
                  @enderror
                  
               </div>

               <div class="mb-4 fs-6">
                 <label for="password" class="visually-hidden">Password</label>
                  <input style="width: 100%;" type="password" name="password" id="password" placeholder="Choose a Password" class=" p-2 bg-light border-2 rounded-3 @error('password') border border-danger @enderror" value="">
                  
                  @error('password')
                   <div class="text-danger mt-2 text-sm">
                      {{ $message }}
                   </div>
                  @enderror
                  
               </div>
              
               <div class="mb-5 fs-6">
                  <label for="password_confirmation" class="visually-hidden">Password Again</label>
                  <input style="width: 100%;" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class=" p-2 bg-light border-2 rounded-3"  value="">
               
                
               </div>

               <div class="d-grid gap-2">
                 <button type="submit" class="btn btn-primary">Register</button>
               </div>
            </form>
         
         </div>
   </div>
@endsection