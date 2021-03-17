<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

 <link href="{{asset('/css/main.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="{{ url('/') }}">CRM</a>
  
  <!-- Links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      @if (Route::has('login'))
      
          @auth
              <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Dashboard</a>
          @else
              <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

              {{-- @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
              @endif --}}
          @endauth
     
  @endif
    </li>
  </ul>
</nav>

<div class="hero-image">
    <div class="hero-text">
      <h1 style="font-size:50px">Skooleo CRM</h1>
      <h3>Very affordable and easy to use</h3>
     
    </div>
</div>

<div class="container_fluid">
    <div class="features_column">
      <div class="section_features_4_title">What we do</div>
       <div class="section_features_1_grid">
          <div class="section_features_1_grid_box">
              <img src="{{asset('/img/download.png') }}" alt="" class="features_1_img">
             <div class="features_1_title">Inventory</div>
             <div class="features_1_description">
                With our in-house award winning designers, we recognize the fact that usability, functionality 
                and visualization are three of the most important factors when designing interfaces or web sites.
             </div>
             
          </div>
          <div class="section_features_1_grid_box">
              <img src="{{asset('/img/download.png')}}" alt="" class="features_1_img">
             <div class="features_1_title">Sales</div>
             <div class="features_1_description">
                With our in-house award winning designers, we recognize the fact that usability, functionality 
                and visualization are three of the most important factors when designing interfaces or web sites.
             </div>
             
          </div>
          <div class="section_features_1_grid_box">
              <img src="{{asset('/img/download.png')}}" alt="" class="features_1_img">
             <div class="features_1_title"> Consultancy & Advisory Services</div>
             <div class="features_1_description">
                With our in-house award winning designers, we recognize the fact that usability, functionality 
                and visualization are three of the most important factors when designing interfaces or web sites.
             </div>
           
          </div>
       </div>
    </div>
</div>
</div>
<div class="footer">
    <p id="foot">skooleo©2021</p>
</div>
</body>
</html>
