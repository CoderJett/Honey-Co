<x-app-layout>

<div class = "card-wrapper">
  <form action="{{ url('cart') }}" method="POST">
      @csrf
      
        @if (count($products) < 1)
        <div class = "imager">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src = /storage/nostock.jpg alt = "product image">
            </div>
          </div>
        </div>
        @endif

        @foreach($products as $product)
        <div class = "card">
        <div class = "product-imgs">
        <div class = "img-display">
          <div class = "img-showcase">
            <img src = {{ $product->image_path }} alt = "product image">
          </div>
        </div>
        <div class = "img-select">
          <div class = "img-item">
            <a href = "#" data-id = "1">
              <img src = "/storage/highshine1.jpg" alt = "product image">
            </a>
          </div>
          <div class = "img-item">
            <a href = "#" data-id = "2">
              <img src = "/storage/highshine2.jpg" alt = "product image">
            </a>
          </div>
          <div class = "img-item">
            <a href = "#" data-id = "3">
              <img src = "/storage/highshine3.jpg" alt = "product image">
            </a>
          </div>
          <div class = "img-item">
            <a href = "#" data-id = "3">
              <img src = "/storage/highshine4.jpg" alt = "product image">
              </a>
          </div>
        </div>
      </div>
      <!-- display right -->
      <div class = "product-contenter">
        <h2 class = "product-title">{{ $product->brand }}</h2>
        <div class = "product-price">
          <p class = "new-price"> ₱ {{ $product->regular_price }}</p>
        </div>

        <div class = "product-detail">
          <h2>Description: </h2>
          <p>{{ $product->description }}</p>
          
        </div>

        <div class = "purchase-info">
          @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ Session::get('success_message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidde="true">&times;</span>
                      </button>
                    </div>
          @endif
          @if(Session::has('error_message'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{ Session::get('error_message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidde="true">&times;</span>
                      </button>
                    </div>
          @endif  

          <div class="shade">
              Shade: <select name="shade" id="shade">
                @foreach($shades as $shade)
                  <option value="{{ $shade->shade_name }}">{{ $shade->shade_name }}</option>
                @endforeach 
                     </select>
                    <br>Quantity:
                    <input name="quantity" type="number" class="span1" placeholder="Qty." min="1" max="{{$shade->quantity}}" required="">
                    <br>Stock Status: {{$shade->stock_status  }}
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="user_id" value="{{$id}}">

          </div>

         

          <a href="{{ route('cart', $id) }}"><button type = "submit" class = "btn-cart">Add to Cart<i class = "fas fa-shopping-cart"></i>
          </button></a>
        </div>
      </div>
      @endforeach
      <!-- End of data transferring using foreach loop -->

    </div>
  </form>
  </div>
</x-app-layout>