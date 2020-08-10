@extends('layouts.app')
@section('content')
 
<style type="text/css">
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;
  width:100%;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

</style>
<div>
    <div class=" row  pl-lg-5 ml-lg-5" style=" margin:auto">
        <div class="col-lg-5 col-sm-12 ml-3">
            <div class="container cart_container p-5 bg-light" style=" border:solid black 2px;">
                        <h2 class="cart_title text-center">Shopping Cart</h2>
                        <br><hr><br>
						<div class="cart_items">
							<ul class="cart_list">
                                @foreach ($cart as $item)
                                    
                                
								<li class="cart_item clearfix">
                                
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_image"><img src="{{url($item->options->image)}}" alt="" height="40px" width="40px"></div>
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
                                        <div class="cart_item_text">{{$item->name}}</div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
                                        <div class="cart_item_text">{{ $item->options->color}}</div>
										</div>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">size</div>
											<div class="cart_item_text">{{$item->options->size}}</div>
										</div>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text">{{$item->qty}}</div>
										</div>
										
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">{{$item->price}}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">{{$item->price * $item->qty }}</div>
										</div>
										{{-- <div class="cart_item_total cart_info_col">
											<div class="cart_item_title">action</div>
                                            <div class="cart_item_text"> 
                                            <a href="{{url('delete/cart/item/'.$item->rowId)}}"><i class="fas fa-trash-alt" style=" color:red"></i></a>
                                            
                                           
                                            
                                            </div>
										</div> --}}
									</div>
                                </li>
                                <br><hr>
                                @endforeach
							</ul>
						</div>

        </div>
        
            <div class="container cart_container p-5 bg-success" style=" border:solid black 2px;">
                       
                        
						<div class="cart_items ">
                            	<ul class="cart_list">
								<li class="cart_item clearfix float-right">
                                    @if (Session::has('coupon'))
                                    SubTotal : {{session::get('coupon')[0]['amount']}}
                                    @else
                                    SubTotal : {{cart::total()}}    
                                    @endif
                                    
                                </li>
                                <br>
								<li class="cart_item clearfix float-right">
                                     shipping  charge :200
                                </li>
                                <br>
								<li class="cart_item clearfix float-right">
                                     vat :200
                                </li>
                                <br>
								<li class="cart_item clearfix float-right">
                                          @if (Session::has('coupon'))
                                    Total : {{session::get('coupon')[0]['amount']}}
                                    @else
                                    Total : {{cart::total()}}    
                                    @endif
                                    
                                </li>
                                </ul>
                            
                        </div>

        </div>
   
        </div>
        <div class="col-lg-5 col-sm-10  " >
    
            <div class="container p-5 bg-light " style=" border:solid black 2px;"> 
                <h2 class="cart_title text-center">Payment</h2><br><hr>

               

<form action="{{route('stripe.charge')}}" method="post" id="payment-form"> 
    @csrf
  <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>
 <br><br>
<input type="hidden" name="name" value="{{$request->name}}">
<input type="hidden" name="email" value="{{$request->email}}">
<input type="hidden" name="phone" value="{{$request->phone}}">
<input type="hidden" name="address" value="{{$request->address}}">
<input type="hidden" name="city" value="{{$request->city}}">
  <button type="submit" class=" btn btn-success">Pay now</button>
</form>
                </div>
         
    
    
</div>

<script type="text/javascript">
  // Create a Stripe client.
var stripe = Stripe('pk_test_51HDxSEEnc64osRuYUecxlXsnUjw3JE5CiyA3mKDidham0xE37af7vDFUibJbkxH48bOHUFwj9HD6PR1GT5E5mzuU00ybShUbMP');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>

@endsection