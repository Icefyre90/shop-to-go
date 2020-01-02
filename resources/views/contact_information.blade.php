@include ('temps.home_header')

<div class="container  bg-white mb-5">
    <div class="row mt-5 align-items-center">
        <div class="col">
            <h2>N Products</h2>
            <div class="row mb-3">
                <div class="col-12 justify-content-sm-center mt-3 mb-3">
                    <a href="view_cart" class="text-center">Cart</a> / Customer information / <a href="home" class="text-center">Shipping method / </a><a href="home" class="text-center">Payment method</a>
                    <hr></div>

            </div>
            <div class="row">
                <div class="col-6">
                    <h5>Contact information</h5>
                </div>
                <div class="col-6">
                    Already have an account?
                    <a href="#"  data-toggle="modal" data-target="#SinginModal" >
                        Sing in
                    </a>
                </div>
            </div>
            <form id="bayerinfo" method="POST" action="{{ route('shipping_method') }}" >
                                   @csrf
                     @if(session()->has('payment_info')) 
                   <?php  $payment_info=json_decode(Session::get('payment_info')); ?>
            <div class="row mt-1">
                <div class="col-12">
                   
                    <input type="email" class="form-control" name="email" id="BayerEmail" aria-describedby="emailHelp" placeholder="Enter email"  value="{{ $payment_info->email }}" required>
                    
                    
                </div>
            </div>
           
                       
        
            <div class="row mt-4">
                <div class="col-6">
                    <h5>Shipping address</h5>
                </div>
                <div class="col-6">

                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <input type="text" class="form-control" name="fname"  value="{{$payment_info->fname}}" id="BayerFirstname" placeholder="First name" value="" required>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" name="lname" value="{{$payment_info->lname}}" id="BayerLastname" placeholder="Last name">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <input type="text" class="form-control"  name="company"  value="{{$payment_info->company}}" id="BayerCompany" placeholder="Company (optional)">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <input type="text" class="form-control" name="addres" value="{{$payment_info->addres}}" id="BayerAddres" placeholder="Addres" required>
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="col-12">
                    <input type="text" class="form-control" name="apartment" value="{{$payment_info->apartmen}}" id="BayerApartment" placeholder="Apartment (optional)">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <input type="text" class="form-control"  value="{{$payment_info->city}}"  name="city"id="BayerCity" placeholder="City" >
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="col-6">
                    <input type="text" class="form-control" name="country" value="{{$payment_info->country}}" id="BayerCountry" placeholder="Country" required>
                </div>
                <div class="col-6">
                    <input type="number" class="form-control" name="postal" value="{{$payment_info->postal}}" id="BayerPostal" placeholder="Postal code">
                </div>
            </div>
         
           
            <div class="row mt-2">
                <div class="col-12">
                    <input type="number" class="form-control" name="phone" value="{{$payment_info->phone}}" id="BayerPhone" placeholder="Phone" required>
                </div>
            </div> 
            @else
             <div class="row mt-1">
                <div class="col-12">
                   
                    <input type="email" class="form-control" name="email" id="BayerEmail" aria-describedby="emailHelp" placeholder="Enter email"  value="" required>
                    
                    
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-6">
                    <h5>Shipping address</h5>
                </div>
                <div class="col-6">

                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <input type="text" class="form-control" name="fname" value="" id="BayerFirstname" placeholder="First name" value="" required>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" name="lname" value="" id="BayerLastname" placeholder="Last name">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <input type="text" class="form-control" name="company" value="" id="BayerCompany" placeholder="Company (optional)">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <input type="text" class="form-control" name="addres" value="" id="BayerAddres" placeholder="Addres" required>
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="col-12">
                    <input type="text" class="form-control" name="apartment" id="BayerApartment" placeholder="Apartment (optional)">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <input type="text" class="form-control"  value=""  name="city" id="BayerCity" placeholder="City" required>
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="col-6">
                    <input type="text" class="form-control" name="country" value="" id="BayerCountry" placeholder="Country" required>
                </div>
                <div class="col-6">
                    <input type="number" class="form-control" name="postal" value="" id="BayerPostal" placeholder="Postal code">
                </div>
            </div>
         
           
            <div class="row mt-2">
                <div class="col-12">
                    <input type="number" class="form-control" name="phone" value="" id="BayerPhone" placeholder="Phone" required>
                </div>
            </div> 
            @endif
            <div class="row mt-4 mb-5 mr-3">
                <div class="col-6">
                    <a href="{{route('view_cart')}}" class="text-center"><- Return to cart</a>
                </div>
                <div class="col-6 ">
                    <button type="submit" class="btn btn-primary btn-lg mr-5" >Continue to shipping method</button>
                </div>
            </div>
        </div>
        <div class="col d-none h-100 mt-5 pt-5 d-xl-block d-lg-block bg-light border">

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
            </form>
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