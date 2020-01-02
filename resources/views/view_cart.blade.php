@include ('temps.home_header')
<div class="container bg-white mb-5 pb-5 pt-3">
    <div class="row">
        <div class="col-12 justify-content-sm-center mt-3 mb-3">
            @if(session()->has('notif'))
                               <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> {{session()->get('notif')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
                                @endif
            <h1 class="font-weight-bold m-0  text-center"><font size="6">CART</font></h1><br/>
            <a href="home" class="text-center">Home</a>/Cart<hr>

        </div>
    </div>
    <div class="row m-0">
        <div class="col-1"> </div>
        <div class="col-2 m-0 p-0">
        </div>
        <div class="col-3">
            <h1 class="font-weight-bold m-0 "><font size="4">Product</font></h1><br/>

        </div>
        <div class="col-2">
            <h1 class="font-weight-bold m-0 "><font size="4">Price</font></h1><br/>

        </div>
        <div class="col-2">
            <h1 class="font-weight-bold m-0 "><font size="4">Quantity</font></h1><br/>

        </div>
        <div class="col-2">
            <h1 class="font-weight-bold m-0 "><font size="4">Total</font></h1><br/>
        </div>
    </div>
    <hr class="mt-0">
    @if(Session::has('cart'))
    @foreach($cart=Session::get('cart')->items; as $product)
    <div class="row m-0">
        <div class="col-1"> <a type="button" href="{{route('product.removeItem', ['id'=> $product['item']['idproduct']])}}" class="btn btn-danger btn-sm mt-4 ml-3">X</a></div>
        <div class="col-2 img-fluid"><img class="activator img-fluid " width="100px" src="{{ $product['item']['img_folder']}}">
        </div>
        <div class="col-3">
            <h5 class="font-weight-bold m-0 mb-3"><font size="3.5">{{ $product['item']['name']}}</font></h5>
            <p class="m-0"> <font size="2">BLUE</font></p>
            <p class="m-0"><font size="2">LARGE</font></p>

        </div>
        <div class="col-2">
            <input class="w-10 m-0  font-weight-bold border-0 mt-4" size="20" type="text" name="" value="{{ $product['price']}}" readonly=""
                   style="width: 54px;">

        </div>
        <div class="col-2">
            <input class="w-10 m-0 mr-3 text-center mt-4" size="20" type="number" name="" value="{{ $product['qty']}}" readonly=""
                   style="width: 54px;">

        </div>
        <div class="col-2">
            <input class="w-10 m-0  font-weight-bold border-0 mt-4" size="20" type="text" name="" value="{{ $product['price']}}" readonly=""
                   style="width: 54px;">
        </div>
    </div>
    <hr>
    @endforeach
    @endif

    <hr class="mt-0"><br/><br/>
    <div class="row bg-light pt-3 pb-3 mb-3">
        <div class="col-6">
            <div class="form-group mt-3">
                <label for="comment" class="m-0 font-weight-bold">Special Instructions:</label>
                <textarea class="form-control" rows="2" id="comment"></textarea>
            </div>
        </div>
        <div class="col-6">
            <h1 class="font-weight-bold m-0 "><font size="4">Cart Total</font></h1><br/>
            <div class="container bg-white">
                <div class="row pt-3">
                    <div class="col-6">Subtotal:
                    </div>
                    <div class="col-6">
                        <input class="w-10  block font-weight-bold border-0  text-right" size="20" type="text" name="" value="{{ Session::has('cart') ? Session::get('cart')->totalPrice : ''}}" readonly=""
                               style="width: 70px;">
                    </div>
                </div>
                <hr>
                <div class="row pb-3">
                    <div class="col-6"><h1 class="font-weight-bold m-0 "><font size="5">Total</font></h1>
                    </div>
                    <div class="col-6">
                        <font size="4"><input class="w-20  block font-weight-bold border-0 text-right"  type="text" name="" value="{{ Session::has('cart') ? Session::get('cart')->totalPrice : ''}}" readonly=""
                                              style="width: 80px;"></font>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-block">
                        @guest
                       <a href="{{ route('checkout') }}"> <button type="button" class="btn btn-info btn-block mb-3  "  >CHECKOUT AS GUEST</button></a>
                        <a  href="#"  data-toggle="modal" data-target="#SinginModal"><button type="button" class="btn  btn-success  btn-block  mb-3 " >LOG IN/CREATE ACCOUNT</button></a>
                        <h5 class="font-weight-bold m-0 text-center "><font size="2">Login or create an account to track your order status</font></h5><br/>
                        @else
                        <a href="{{ route('checkout') }} "><button class="btn btn-info btn-block mb-3 "> CHECKOUT</button> </a>
                       
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("temps/footer")