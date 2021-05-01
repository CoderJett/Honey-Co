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

          <h4>Shipping Address <i class = "fas fa-shipping-fast"></i></li></h4>
          <input disabled type="text" class="textfield" placeholder="Address" value ="{{ $det->address }}" required="">
          <input disabled type="text" class="textfield" placeholder="City" value ="{{ $det->city }}" required="">
          <input disabled type="text" class="textfield" placeholder="Zip Code" value ="{{ $det->zipcode }}" required="">
        </div>
        @endforeach
      
      <a href="{{ route('checkout.submitOrder', $id ) }}"><button type="submit" class="btn-out">SUBMIT ORDER</button></a>
      
    </div>
  </div>
</div>