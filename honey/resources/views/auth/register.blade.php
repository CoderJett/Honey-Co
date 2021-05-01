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

        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="login-wrap">
                    <!--VALIDATION-->
                    <x-jet-validation-errors class="mb-4" />
                    
                <!--FULL NAME-->
                <div class="mt-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <!--EMAIL ADDRESS-->
                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!--PHONE NUMBER-->
                <div class="mt-4">
                    <x-jet-label for="phone_number" value="{{ __('Phone Number') }}" />
                    <x-jet-input id="phone_number" class="block mt-1 w-full" type="number" name="phone_number" :value="old('phone_number')" required />
                </div>

                <!--ADDRESS-->
                <div class="mt-4">
                    <x-jet-label for="address" value="{{ __('Address') }}" />
                    <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                </div>

                <!--CITY-->
                <div class="mt-4">
                    <x-jet-label for="city" value="{{ __('City') }}" />
                    <x-jet-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
                </div>

                <!--ZIP CODE-->
                <div class="mt-4">
                    <x-jet-label for="zipcode" value="{{ __('Zip code') }}" />
                    <x-jet-input id="zipcode" class="block mt-1 w-full" type="number" name="zipcode" :value="old('zipcode')" required />
                </div>
                
                
                <!--PASSWORD-->
                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms"/>

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                        @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
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
