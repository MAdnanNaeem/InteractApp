<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Interact App | Social Platform</title> 
</head>
<body style="background-color:#e5f6e5 ;">
 

<div class="container-fluid p-3 fs-5 bg-white mb-5">
  
  <div class="row">
<div class="col-xl-8 col-lg-7 col-md-6 col-sm-7">
    <ul class="nav justify-content-start  ">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('posts') }}">Post</a>
  </li>
  
</ul>

</div>

<div class="col-xl-4 col-lg-5 col-md-6 col-sm-5">
<ul class="nav ms-5">
 
 @auth
     
 
      <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">{{ auth()->user()->name }}</a>
  </li>

  <li class="nav-item">
    <form action="{{ route('logout') }}" method="post" class="d-inline">
    @csrf
      <button style="border: none; background-color:white;" class="nav-link " type="submit">Logout</button>  
    </form>  
  </li>

  @endauth
  
  @guest
      
      <li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}">Register</a>
  </li>
  
  @endguest
  
</ul>
</div>
</div>
</div>
  

@yield('content')



  

  <script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </script>
</body>
</html>