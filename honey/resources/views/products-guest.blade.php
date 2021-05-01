<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        

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
        <div class = "products">
            <div class = "container">
                <h1 class = "head-title">Featured Products</h1>
                <p class = "text-light">We offer highly products that are specially crafted to nourish and moisturize your skin.</p>

                <div class = "product-items">
                    <!-- single product1 -->
                    <div class = "product">
                        <div class = "product-content">
                            <div class = "product-img">
                                <img src = "/storage/keyring.jpg" alt = "product image">
                            </div>
                            <div class = "product-btns">
                               <a href="guest-KR"><button type = "button" class = "btn-details"> view details 
                                    <span><i class = "fas fa-plus"></i></span>
                                </button></a>
                            </div>
                        </div>
                        

                        <div class = "product-info">
                            <div class = "product-info-top">
                                <h2 class = "prod-title">Beauty</h2>

                                
                            </div>
                            <a href = "#" class = "product-name">Glossy Balm (Keyring Collection)</a>
                            <p class = "product-price">₱ 149.00</p>
                        </div>  
                    </div>
                    <!-- end of single product1 -->

                    <!-- single product2 -->
                    <div class = "product">
                        <div class = "product-content">
                            <div class = "product-img">
                                <img src = "/storage/highshine1.jpg" alt = "product image">
                            </div>
                            <div class = "product-btns">
                                <a href="guest-HS"><button type = "button" class = "btn-details"> view details 
                                     <span><i class = "fas fa-plus"></i></span>
                                 </button></a>
                             </div>
                        </div>

                        <div class = "product-info">
                            <div class = "product-info-top">
                                <h2 class = "prod-title">Beauty</h2>
                                
                            </div>
                            <a href = "#" class = "product-name">Glossy Balm (High Shine Colour Lip Gloss)</a>
                            <p class = "product-price">₱ 249.00</p>
                        </div>
                    </div>
                    <!-- end of single product2 -->
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

</html>


    