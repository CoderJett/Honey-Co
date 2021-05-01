<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Oh Honey & Co</title>
        

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
                        <li><a href="/">Home</a>
                          <i class = "fas fa-home"></i></li>

                          <li><a href="products">Products</a>
                            <i class = "fas fa-store"></i></li>  

                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/dashboard') }}" >Dashboard</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Log in</a></li>
    
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth

                    </ul>
                @endif
                </nav>
              
            </div>
            </div>
            
            <div class="main">
            <body class ="bodi">


                <div class="container">
                <div class="row">
                    <div class="col-2">
                        <h1>Welcome to Oh Honey&Co!</h1>
                        <p>Honest beauty, Thoughtfully made
                            <br>Always cruelty-free, Everyday friendly.</p>
          
             
                    </div>
                    
                    <div class="col-2">
                        <img src="/storage/logo3.jpg">
                    </div>
                </div>
                </div>
          
          <!---gallery--->
          <div class="gallery">
              <div class="row">
                  <div class="col-3">
                      <img src="/storage/gallery1.jpg">
                  </div>
                  <div class="col-3">
                      <img src="/storage/gallery2.png">
                  </div>
                  <div class="col-3">
                      <img src="/storage/gallery3.jpg">
                  </div>
              </div>
          </div>
          </body>
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

</html>


    