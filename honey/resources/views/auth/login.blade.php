<x-guest-layout>   
    
    <html>
        <head>
            <meta charset="utf-8" />
            <title>Login</title>
            <link href="{{ asset('css/logon.css') }}" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        </head>
        <body>
            <div class="navbar">
                <div class="brand">
                    Oh Honey & Co.
                </div>
                
            </div>

        

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login-wrap">
                <!--VALIDATION-->
                <x-jet-validation-errors class="mb-4" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                <!--VALIDATION-->    
                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-4 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-4 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex mt-4 ">
                    <h1> Not a member yet? <h1>
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                </div>

                <div class="mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="foot-lnk">

                    @if (Route::has('password.request'))
                        <a class="underline text-m text-white-600 hover:text-red-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        <x-jet-button class="ml-4">
                            {{ __('Log in') }}
                        </x-jet-button>
                    @endif
                </div>
            </div>
        </form>
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
</body>
</html>
</x-guest-layout>
