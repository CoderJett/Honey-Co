<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
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
                        <li><a href="{{ route('admindash') }}">Dashboard</a>
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
            
        

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <!-- Page Heading -->
<div class="main">
    <div class="AP">
        <div class="main-content">
            <div class="container" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="AP-panel">
                                <div class="row">
                                    <div class="AP-h2" style="color: #ff9800;">
                                        <h2>EDIT PRODUCT</h2>
                                    </div>
    
                                </div>
                            </div>
                            <div class="container">
                                <div class="APform">
                                <?php $new_product_brand = ''; $new_product_price = ''; $new_product_description = ''; $new_product_image = ''; $prod_id = 0;?>
                                <form action="{{ route('update') }}">
                                    @foreach($product as $pro)
                                    <input type="hidden" name="prod_id" id ="prod_id" value="{{$pro->id}}">
                                    <div class="AP-form-steps">
                                    <h4>Product Brand <i class = "fas fa-check-square"></i></li></h4>
                                    <input type="text" class="textfield" placeholder="Product Brand" required="" value="{{ $pro->brand }}" id="new_product_brand" name="new_product_brand">

                                    </div>
                                    
                                    <div class="AP-form-steps">
                                    <h4>Product Description <i class = "far fa-comment-alt"></i></li></h4>
                                    <input  type="text" class="textfield" placeholder="Product Description" style="height:100px" value ="{{ $pro->description }}" required="" id="new_product_description" name="new_product_description">

                                    </div>

                                    <div class="AP-form-steps">
                                    <h4>Product Price <i class = "fas fa-money-bill"></i></li></h4>
                                    <input type="text" class="textfield" placeholder="Product Price" value ="{{ $pro->regular_price }}" id="new_product_price" name="new_product_price"required="">

                                    </div>

                                    <div class="AP-form-steps">
                                        <h4>Product Image <i class = "fas fa-image"></i></li></h4>
                                        <img src="{{ $pro->image_path }}" style="height: 200px"><br>
                                        <input type="file" class="input-file" value ="{{ $pro->image_path }}" id="new_product_image" name="new_product_image"required="">
    
                                    </div>
                                    @endforeach
                                    <a href="#"><button type="submit" class="AP-button">UPDATE PRODUCT</button></a>
                                </form>
                                
           
                                </div>
                            </div>
                        </div>
                    </div>
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