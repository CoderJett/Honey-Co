<x-app-layout>
 <!--checkout form-->
 <div class="checkout">
    <div class="container">
      <div class="checkout-inner">
        <form>
          @foreach($user as $det)
          <div class="checkout-form-steps">
            <h4>Personal Details <i class = "fas fa-user"></i></li></h4>
            <input disabled type="text" class="textfield" placeholder="Full Name" required="" value="{{ $det->name }}">
            <input disabled type="email" class="textfield" placeholder="Email" value ="{{ $det->email }} "required="">
            <input disabled type="text" class="textfield" placeholder="Mobile No." value ="{{ $det->phone_number }}"required="">
          </div>
          
          <div class="checkout-form-steps">
            <h4>Shipping Address <i class = "fas fa-shipping-fast"></i></li></h4>
            <input disabled type="text" class="textfield" placeholder="Address" value ="{{ $det->address }}" required="">
            <input disabled type="text" class="textfield" placeholder="City" value ="{{ $det->city }}" required="">
            <input disabled type="text" class="textfield" placeholder="Zip Code" value ="{{ $det->zipcode }}" required="">
          </div>
          @endforeach
          <div class="checkout-form-steps">
            <h4>Chosen Payment <i class = "fas fa-money-bill"></i></li></h4>
            <input disabled type="text" class="textfield" placeholder="Address" value ="{{ $method }}" required="">
            {{-- <label for="radio1">
              <input checked='checked' type="radio" name="paymentoptions" id="radio1" value = "{{ $opt->method }}"> Gcash - insert gcash number ng client
            </label>
  
            <label for="radio2">
              <input type="radio" name="paymentoptions" id="radio2" > Cash on Delivery (COD)
            </label>
  
            <label for="radio3">
              <input type="radio" name="paymentoptions" id="radio3"> Bank - insert bank account details ng client
            </label> --}}
            
          </div>
        </form>
        @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ Session::get('success_message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidde="true">&times;</span>
                      </button>
                    </div>
          @endif
        
        <a href="{{ route('checkout.submitOrder', $id ) }}"><button type="submit" class="btn-out">SUBMIT ORDER</button></a>
        
      </div>
    </div>
  </div>
</x-app-layout> 
  