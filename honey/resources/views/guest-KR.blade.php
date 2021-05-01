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
        <link rel="stylesheet" href="{{ mix('css/guest.css') }}">
        

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
                <div class = "card-wrapper">
                    <div class = "card">
                      <!-- display left -->
                      <div class = "product-imgs">
                        <div class = "img-display">
                          <div class = "img-showcase">
                            <img src = /storage/keyring1.jpg alt = "product image">
                          </div>
                        </div>
                        <div class = "img-select">
                          <div class = "img-item">
                            <a href = "#" data-id = "1">
                              <img src = "/storage/keyring2.jpg" alt = "product image">
                            </a>
                          </div>
                          <div class = "img-item">
                            <a href = "#" data-id = "2">
                              <img src = "/storage/keyring3.png" alt = "product image">
                            </a>
                          </div>
                          <div class = "img-item">
                            <a href = "#" data-id = "3">
                              <img src = "/storage/keyring4.png" alt = "product image">
                            </a>
                          </div>
                          <div class = "img-item">
                            <a href = "#" data-id = "3">
                              <img src = "/storage/keyring5.png" alt = "product image">
                              </a>
                          </div>
                        </div>
                      </div>
                      <!-- display right -->
                      <div class = "product-content">
                        <h2 class = "product-title">Glossy Balm (Keyring Collection)</h2>  
                        <div class = "product-price">
                          <p class = "new-price"> ₱ 149.00</p>
                        </div>
              
                        <div class = "product-detail">
                          <h2>Description: </h2>
                          <p>Say hello to your new lips bestfriend! Our Glossy Balm has 5 shades: melted honey, red rum, sweet marsala, hard candy and juiced up.
                              Like balm, it has a rich, meltingly soft texture but it also has the shine and plumping effects of a gloss. It’s infused with moisturizing ingredients like coconut and grape-seed oils to help keep your lips well hydrated while leaving behind a sheer and soft color that's long lasting.
                              Did we already say it's not drippy? It stays firm on the lips! And, most importantly, it leaves your lips with the prettiest glow—I know, I know, but there's no better word for it.
                              The sheer nature of these glosses make them perfect for layering and pairing with other lip products like lipstick.</p>
                           
                        </div>
              
                        <div class = "purchase-info">
                            
                          <div class="shade">
                              Shade: <select>
                                  <option>Red Rum</option>
                                  <option>Melted Honey</option>
                                  <option>Sweet Marsala</option>
                                  <option>Hard Candy</option>
                                  <option>Juiced Up</option>
                                     </select>
                          </div>   
                          <div class="quantity">
                          Quantity: <input type = "number" min = "0" value = "1">
                          </div>
              
                          <a href="{{ route('login') }}"><button type = "submit" class = "btn-cart">YOU NEED TO LOG IN<i class = "fas fa-shopping-cart"></i>
                          </button></a>
                        </div>
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


    