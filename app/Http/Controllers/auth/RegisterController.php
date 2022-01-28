<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

           public function __construct()
           {
            
             $this->middleware(['guest']);

           }

    // Created an index method here to do the same thing from Controller_Class function_index which we were doing directly from View.

    public function index(){
           
        return view('auth.register');
    }

    public function store(Request $request){

        //* die-dump is use to kill the page and will output the parameters value.
        
        /**
          dd('abc');
          **/ 

        //! 1. Validate the request
        //*  Grab the Request obj (&request) bcuz it contains all the information about the request
        //* check by using 'dd()' method
        //  dd($request);
        // dd($request->email);

        //! Validation method
        
        $this->validate($request,[
         
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        
        //! 2. Store the user
      
          User::create([

            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
            //! to avoid from saving the password as plain text we use built-in laravel function called hash::make()" also do import it's class( use Illuminate\Support\Facades\Hash; )
            
       
            
          ]); 

        //! 3. Sign the user in
            
        //*   auth()->user(); //this will return user-model who just signed-it
        
        auth()->attempt($request->only('email','password'));

        //! 4. Redirect the user 
        return redirect()->route('dashboard'); 
    }
}
 