<x-app-layout>

<!--cart content-->

<div class="main">
<div class="small-container cart-page">
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Shade</th>
            <th>Subtotal</th>
        </tr>

        <?php $final_price = 0; $delivery_fee = 100; $total_price = 0; $methods = ["GCASH", "COD", "BANK"]?>

        @foreach($userCartItems as $item)
        <?php  $sub_total = ($item->regular_price) * ($item->quantity);?>
        <tr>
            <td>   
                <div class="cart-info">
                    <img src="{{ $item->image_path}}">
                    <div>
                        <p>{{ $item->brand }}</p>
                        <small>Price: ₱ {{ $item->regular_price }}</small>
                        <br>

                        <form action="{{ route('cart.destroy', $item->id) }}" method="post">
                            <input type="hidden" name="_method" value="DELETE" />
                                {{ csrf_field() }}
                                 {{ method_field('DELETE') }}
                            
                            <input type="submit" class="btn-cart-delete" value="delete" />
                            </form>
                    </div>
                </div>
            </td>
            <td>
                @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ Session::get('success_message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidde="true">&times;</span>
                      </button>
                    </div>
                @endif
                <input type="text" required="" min="1" max="10" value="{{ $item->quantity }}">
                <a href="{{ route('cart.increment', $item->id) }}"><button>+</button></a>
                <a href="{{ route('cart.decrement', $item->id) }}"><button>-</button></a>
 
            </td>

            <td>{{ $item->shade }}</td>
            <td>₱ {{ $sub_total }}.00</td>
        </tr> 
        <?php $total_price = $total_price + (($item->regular_price) * ($item->quantity)); $final_price = $total_price + $delivery_fee;?>
        @endforeach  
    </table>
    
<div class="total-price">
    
    <table>
        <tr>
            <td>Subtotal</td>
            <td>₱ {{ $total_price }}.00</td>
        </tr>
        <tr>
            <td>Delivery Fee</td>
            <td>₱ {{ $delivery_fee }}.00</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>₱ {{ $final_price }}.00</td>
        </tr>   

    </table>
    
</div>
<form action="{{ route('checkout.addToCheckout') }}">
<select name="method" class = "btn-out" id="method">
    @foreach($methods as $opt)
    <option value="{{ $opt }}">{{ $opt }}</option>
    @endforeach
</select>
<input type="hidden" name="user_id" id ="user_id" value="{{$id}}">

<a href=""><button type = "submit" class = "btn-out">Check-out</button></a>
</form>
</div>
</div>



<!--cart content-->




</x-app-layout>

