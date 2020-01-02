@include ('temps.home_header')
	<div class="container  bg-white mb-5">
		<div class="row mt-5 align-items-center"> 
			<div class="col h-100">
				<h2>N Products</h2>
				<div class="row mb-2">
					<div class="col-12 justify-content-sm-center mt-3 mb-3">
                                <a href="view_cart" class="text-center">Cart</a> / <a href="contact_information" class="text-center">Customer information </a>/ Shipping method / <a href="home" class="text-center">Payment method</a>
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
						<div class="col-7">Standard Ground Shipping · $11.00</div>
						<div class="col-2"><a href="contact_information" class="text-center">Change</a></div></div>
					</div>
				</div>
				@endif
				<div class="row">
					<div class="col">
						<h5>Shipping method</h5>
					</div>
				</div>
				<form id="bayerinfo" method="POST" action="{{ route('payment_method') }}" >
                                   @csrf
				<label for="shipingtype1" class="m-0 p-0 d-block mr-4">
				<div class="row border rounded   pt-3 pb-3">					
					<div class="col-10">
						<div class="form-check">
						    <input type="radio" class="form-check-input" checked="checked"id="shipingtype1"name="optradio">Standard Ground Shipping
						</div>
					</div>
					<div class="col-2">$11.00</div>
				</div></label>
				<label for="shipingtype2" class="m-0 p-0 d-block mr-4">
				<div class="row border rounded  mb-2 pt-3 pb-3">					
					<div class="col-10">
						<div class="form-check">
						    <input type="radio" class="form-check-input" id="shipingtype2"name="optradio">	UPS 2nd Day Air
						</div>
					</div>
					<div class="col-2">
							$29.00
						</div>
					</div></label>
				
				<div class="row mt-4 mb-5 mr-3">
					<div class="col-6">
						<a href="view_cart" class="text-center"><- Return to cart</a>
					</div>
					<div class="col-6 ">
						<button type="submit" class="btn btn-primary btn-lg mr-5">Continue to payment method</button>
					</div>
				</div>
			</form>
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
@include("temps/footer")