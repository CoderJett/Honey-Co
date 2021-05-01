<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @if(Auth::user()->user_type == 'Admin')
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" 
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" 
        crossorigin="anonymous" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
        

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
    </head>

    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="bodi">
            
            <div class="navbar">
                <div class="brand">
                    Oh Honey & Co.
                </div>
                <nav>
                    <ul>
                        <li><a href="admindash">Dashboard</a>
                          <i class = "fas fa-tachometer-alt"></i></li>

                        {{-- <li><a href="adminprof">Admin Profile</a>
                            <i class="fas fa-user-circle"></i> --}}
                        <li><a href="{{ route('profile.show') }}">Admin Profile</a>
                            <i class="fas fa-user-circle"></i>



                        <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                        <i class = "fas fa-sign-out-alt"></i>
                                </form>
                        </li>
                    </ul>
                </nav>
              
            </div>
            </div>
            
            
    <div class="main">
        <h2 class="dash-title">Welcome Admin</h2>
        <div class="dash-card">
    
            <div class="card-single">
                <div class="card-body">
                  <i class = "fas fa-clipboard-list"></i>
                  <div>
                      <h5>Manage Orders</h5>
    
                  </div>
                </div>
                <div class="card-footer">
                    <a href="orderdash">View All</a>
                </div>
            </div>
    
            <div class="card-single">
              <div class="card-body">
                <i class = "fas fa-store"></i>
                <div>
                    <h5>Manage Products</h5>
    
                </div>
              </div>
              <div class="card-footer">
                  <a href="productdash">View All</a>
              </div>
          </div>
    
          <div class="card-single">
              <div class="card-body">
                <i class = "fas fa-user"></i>
                <div>
                    <h5>Manage Users</h5>
    
                </div>
              </div>
              <div class="card-footer">
                  <a href="userdash">View All</a>
              </div>
          </div>
        </div>
    </div>    
<!--footer-->
<div class="footer">
    <div class="row">
        <div class="footer-col-1">
            <h3>Contact Us <i class = "fas fa-envelope"></i></h3>
            biz.ohhoney@gmail.com
            <br>
            (0927) 074 6458
        </div>
        <div class="footer-col-2">
            <img src="/storage/logo-nobg.png">
        </div>
        <div class="footer-col-3">
            <h3>Follow Us <i class = "fas fa-share-alt"></i></h3>
            <ul>
                <a href="https://www.facebook.com/ohhoneyandco">Facebook</a>
                <br>
                <a href="https://www.instagram.com/ohhoneynco">Instagram</a>
            </ul>
        </div> 
    </div>
</div>
<!--footer-->
</div>

@stack('modals')

@livewireScripts
</body>
@else

<x-app-layout>
<head>
<meta charset="utf-8">
<title>Error</title>

<!-- icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>
<body>
<div class="main">
<div class="error-content">
    <h1 class="error-title">
        <i class = "fas fa-info-circle"></i>
        Cannot securely connect to this page
    </h1>

    <p class="error-msg">You are unauthorized to access this page.  <br>
        It is not safe for you to be here please go back. <br><br>
    Try this: 
    </p>
    <li class="link"><a href="dashboard">Go back to the homepage</a></li>
    
    
</div>
</div>

</body>

</x-app-layout>


@endif
</html>


    