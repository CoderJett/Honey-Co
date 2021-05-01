@if(Auth::user()->user_type == 'Admin')
<div class="main">
<div class="main-content">
    <h2 class="dash-title">Manage Products</h2>
    <table class="Tabmin">
        <tr>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Shades</th>
            <th>Is Active</th>
            <th>Actions</th>
            
        </tr>

        {{-- KEYRING PRODUCTS --}}
        @foreach($products as $product)
        <tr>
            <td>{{ $product->brand }}</td>
            <td><img src="{{ $product->image_path }}"></td>
            <td>₱ {{ $product->regular_price }}</td>
            <td>
             <ul>
                
                <div class="shaderbox">
                    @foreach($shades as $shadek)
                        @if ($shadek->shade_id == $product->id)
                        <li style="text-align: right" >{{ $shadek->shade_name }}
                            <input disabled type="text" value="{{ $shadek->quantity }}" class="quantiside ">
                            <a href="#" wire:click.prevent="decrement('{{ $shadek->id }}')"><button>-</button></a>
                            <a href="#"  wire:click.prevent="increment('{{ $shadek->id }}')"><button>+</button></a>
                        </li>
                        @endif
                    @endforeach 
                </div>
                <br>
                <?php $new_shade_name = '' ?>
                <form action="{{ route('addnewshade') }}">
                    <i>Enter New Shade: </i>
                    <input type="text" value="{{ $new_shade_name }}" name="new_shade_name" id ="new_shade_name" style="width: 40%">
                    <input type="hidden" name="product_id" id ="product_id" value="{{$product->id}}">
                    <a href="#" ><button>ADD</button></a>
                </form>
             </ul>

            </td>  
            <td>{{ $product->is_active == 0? 'FALSE' : 'TRUE' }}</td>  
                
            <td>
                <a href="{{ route('editproduct.edit', $product->id ) }}" style="color: blue">
                    <i class="fas fa-check-circle"></i> EDIT PRODUCT 
                 </a> <br>  

                <a href="#" wire:click.prevent="enable('{{ $product->id }}')" style="color: green">
                    <i class="fas fa-check-circle"></i> ENABLE PRODUCT
                 </a> <br>  
                 <a href="#" wire:click.prevent="disable('{{ $product->id }}')" style="color: red">
                    <i class="fas fa-times-circle"></i> DISABLE PRODUCT
                 </a>
                  
           </td>
        </tr>
        
        @endforeach
        

        {{-- HIGH SHINE PRODUCTS --}}
        {{-- @foreach($productsHS as $product)
        <tr>
            <td>{{ $product->brand }}</td>
            <td><img src="{{ $product->image_path }}" center></td>
            <td>₱ {{ $product->regular_price }}</td>
            <td>
             <ul>
              
                <div class="shaderbox">
                    @foreach($shadesHS as $shader)
                    <li style="text-align: right" >{{ $shader->shade_name }}
                        <input disabled type="text" value="{{ $shader->quantity }}" class="quantiside ">
                        <a href="#" wire:click.prevent="decrement('{{ $shader->id }}')"><button>-</button></a>
                        <a href="#"  wire:click.prevent="increment('{{ $shader->id }}')"><button>+</button></a>
                    </li>
                    @endforeach  
                    </div>
                    <br>
                    <?php $new_shade_name = '' ?>
                    <form action="{{ route('addnewshade') }}">
                        <i>Enter New Shade: </i>
                        <input type="text" value="{{ $new_shade_name }}" name="new_shade_name" id ="new_shade_name" style="width: 40%">
                        <input type="hidden" name="product_id" id ="product_id" value="{{$product->id}}">
                        <a href="#" ><button>ADD</button></a>
                    </form>
             </ul>

            </td>

            <td>{{ $product->is_active == 0? 'FALSE' : 'TRUE' }}</td>  

            <td>
                <a href="#" wire:click.prevent="enable('{{ $product->id }}')" style="color: green">
                    <i class="fas fa-check-circle"></i> ENABLE PRODUCT
                 </a>  
                 <br>
                <a href="#" wire:click.prevent="disable('{{ $product->id }}')" style="color: red">
                   <i class="fas fa-times-circle"  ></i> DISABLE PRODUCT
                </a>   
           </td>
        </tr>
        @endforeach --}}



        </table>

        <a href="{{ route('editproduct.edit', $product->id ) }}" style="color: blue">
            <i class="fas fa-check-circle"></i> ADD NEW PRODUCT 
         </a>

        </div>
</div>
@else

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

@endif