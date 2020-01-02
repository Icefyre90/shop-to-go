@include ('temps.home_header')
<script src="https://js.stripe.com/v3/"></script>

	<div class="container  bg-white mb-5">
		<style type="text/css">
		
		.StripeElement {
  box-sizing: border-box;

  height: 40px;

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
		<div class="row mt-5 align-items-center"> 
			<div class="col h-100">
				<h2>N Products 
				</h2>
				<div class="row mb-2">
					<div class="col-12 justify-content-sm-center mt-3 mb-3">
                                <a href="view_cart" class="text-center">Cart</a> / <a href="contact_information" class="text-center">Customer information </a>/ <a href="{{ route('shippingb') }}" class="text-center">Shipping method </a>/ Payment method
					<hr></div>

				</div>
				@if(session()->has('payment_info')) 
                   <?php  $payment_info=json_decode(Session::get('payment_info'));?>
				<div class="row mr-3 mb-5 border rounded">
					<div class="col-12 pt-2">
						<div class="row">
						<div class="col-3">Contact</div>
						<div class="col-7">{{$payment_info->fname}} {{$payment_info->lname}}</div>
						<div class="col-2"><a href="contact_information" class="text-center">Change</a></div></div>
					<hr class="p-0 mt-2 mb-2" ></div>
					
					<div class="col-12">
						<div class="row">
						<div class="col-3">Ship to</div>
						<div class="col-7">{{$payment_info->city}} {{$payment_info->addres}}</div>
						<div class="col-2"><a href="contact_information" class="text-center">Change</a></div></div>
					<hr class="p-0 mt-2 mb-2"></div>
					
					<div class="col-12 pb-2">
						<div class="row">
						<div class="col-3">Method</div>
						<div class="col-7"> {{$payment_info->shipping_method}}· $11.00</div>
						<div class="col-2"><a href="contact_information" class="text-center">Change</a></div></div>
					</div>
				</div>
				@endif
				<div class="row">
					<div class="col">
						<h5>Payment method</h5>
					</div>
				</div>
				<div class="row mr-2">
			<div class="accordion d-block" id="accordionExample" style="  width: 100%" >
			  <div class="card">
			    <div class="card-header" id="headingOne" >
			      <h5 class="mb-0">
			        <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			          Credt card
			        </button>
			      </h5>
			    </div>

			    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" >
			      <div class="card-body" >
              


<form action="{{route('stripepayment')}}" method="post" id="payment-form">
	@csrf
  <div class="form-group">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <button class="btn btn-primary">Submit Payment</button>
</form>
                
              <!-- <input type="text" class="form-control" id="cc-name" placeholder="Cardholder name" required="">
              <div class="col-md-3 mb-3 mt-2">
                <input type="text" class="form-control" id="cc-expiration" placeholder="MM/YY" required="">
              </div>
              <div class="col-md-3 mb-3 mt-2">
                <input type="text" class="form-control" id="cc-cvv" placeholder="CVV" required="">
              </div> -->
			      
			  </div>
			    </div>
			  </div>
			  <div class="card">
			    <div class="card-header" id="headingTwo">
			      <h5 class="mb-0">
			        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			          PayPal
			        </button>
			      </h5>
			    </div>
			    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
			      <div class="card-body">
			        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			      </div>
			    </div>
			  </div>
			</div>
			</div>	
				<div class="row mt-4 mb-5 mr-3">
					<div class="col-6">
						<a href="view_cart" class="text-center"><- Return to cart</a>
					</div>
					<div class="col-6 text-right">
						<a ><button type="button" class="btn btn-primary btn-lg mr-1 ">Complete order</button></a>
					</div>
				</div>
			</div>
			<div class="col d-none h-100 mt-5 pt-5 d-xl-block d-lg-block bg-light border rounded">
				<div class="row">
				<div class="col-12 mt-5">
				</div>
			</div>
				 @if(Session::has('cart'))
             @foreach($cart=Session::get('cart')->items; as $product)
            <div class="row bg-light">
                <div class="col-1">
                </div>
                <div class="col-2 img-fluid border bg-white"><img class="activator img-fluid " width="100px" src="{{asset( $product['item']['img_folder'])}}">
                </div>
                <div class="col-5"><span class="badge badge-danger">{{ $product['qty']}}</span>
                    <p class="m-0 p-0 mt-1">{{ $product['item']['name']}}</p>
                    <p>BLUE / LARGE </p>
                </div>
                <div class="col-3">
                    <input class=" font-weight-bold border-0 mt-4 "  type="text" name="" value="${{ $product['price']}}" readonly=""
                           style="width: 60px;">
                </div>
               
                <div class="col-1">
                </div>
                <hr>
            </div>@endforeach
                                        @endif
			<hr>
			<div class="row bg-light mt-3 ">
				<div class="col-1">
				</div>
				<div class="col-7">
					<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Gift card or discount code">
				</div>
				<div class="col-4">
					<button type="button" class="btn btn-info btn-lg mr-5">Apply</button>
				</div>
				
			</div><hr>
			<div class="row bg-light">
				<div class="col-1">
				</div>
				<div class="col-2">Subtotal
				</div>
				<div class="col-5">
				</div>
				<div class="col-3">
					@if(Session::has('cart'))
                     <?php 
                        $subtotal=0;
                     foreach($cart=Session::get('cart')->items as $product){
                         $subtotal+= $product['price'];
                     }
                     ?>

                    <input class=" font-weight-bold border-0 bg-light"  type="text" name="" value="${{$subtotal}}" readonly=""
                           style="width: 60px;">
                        @endif
				</div>
				<div class="col-1">
				</div>
			</div>
			<div class="row bg-light">
				<div class="col-1">
				</div>
				<div class="col-2">Shipping
				</div>
				<div class="col-5">
				</div>
				<div class="col-3">
					<input class=" font-weight-bold border-0 bg-light"  type="text" name="" value="X" readonly="" 
                                style="width: 60px;">
				</div>
				<div class="col-1">
				</div>
			</div><hr>
			<div class="row bg-light">
				<div class="col-1">
				</div>
				<div class="col-2"><h3 class="font-weight-bold">Total</h3>
				</div>
				<div class="col-5">
				</div>
				<div class="col-3">
					<h3><input class=" font-weight-bold border-0 bg-light"  type="text" name="" value="X" readonly="" 
                                style="width: 70px;"></h3>
				</div>
				<div class="col-1">
				</div>
			</div>
			</div>
		</div>
	</div>

	<script >// Create a Stripe client.
var stripe = Stripe('{{config('services.stripe.key')}}');

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
card.addEventListener('change', function(event) {
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
@include("temps/footer")