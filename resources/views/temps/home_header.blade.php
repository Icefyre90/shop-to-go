
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
    </head>
    <body width="100%" class="border-0 bg-white">


        <div class="content">
            <div class="content-inside">
                <div class=" d-none d-lg-block d-xl-block d-xl-none container-fluid bg-white mydivclass">
                    <div class="text-center row ">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <a  href="{{ route('home_guest') }}"> <img src="{{asset('imgsite/Logo.png')}}"  class="img-responsive" width="70%"></a>
                        </div>

                        <div class=" col-sm-4 d-flex align-items-center justify-content-sm-center">
                            <table class="">
                                <tbody>
                                    <tr>
                                        <td class="align-middle align-center">
                                            <ul class="navbar-nav ml-auto">
                                                <!-- Authentication Links -->
                                                @guest
                                                <a href="#" id="linkforlogin" data-toggle="modal" data-target="#SinginModal" >
                                                    Sing in/Create Acount
                                                </a>

                                                @else
                                                <li class="nav-item dropdown">
                                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                        {{ Auth::user()->name }} <span class="caret"></span>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                                   document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </li>
                                                @endguest
                                            </ul>

                                        </td>
                                        <td>
                                            <a class="btn " data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><button type="button" class="btn btn-link pr-1"><img src="{{asset('imgsite/lupa.png')}}" class="img-responsive" width="15px"></button></a></td>
                                        <td>
                                            <button type="button" class="btn btn-link" id="cart-button" data-toggle="modal" data-target="#myModal2">
                                                <img src="{{asset('imgsite/korpa.png')}}" class="img-responsive" width="30px"> <span class="badge badge-danger">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                                                <span class="sr-only">unread messages</span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="container-fluid bg-white sticky-top font-size-18">
                    <nav class="navbar navbar-expand-lg navbar-light bg-white " style="background-color: #e3f2fd;">
                        <a class="navbar-toggler col-2 border-0 d-none d-sm-block d-xl-none d-lg-none"  href="#"><img src="{{asset('imgsite/Logo.png')}}" class="img-responsive border-0" width="80%"></a>
                        <div clas="col-4 container-fluid"></div>
                        <table class="navbar-toggler mr-1 text-right border-0">
                            <tbody>
                                <tr>
                                    <td class="align-middle align-center">
                                        <a href="#"  data-toggle="modal" data-target="#SinginModal" >
                                            Sing in/Create Acount
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn " data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><button type="button" class="btn btn-link pr-1"><img src="{{asset('imgsite/lupa.png')}}" class="img-responsive" width="15px"></button></a></td>
                                    <td>
                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal2">
                                            <img src="{{asset('imgsite/korpa.png')}}" class="img-responsive" width="30px"> <span class="badge badge-danger">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                                            <span class="sr-only">unread messages</span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-center text-center" id="navbarColor03">
                            <ul class="navbar-nav mr-auto justify-content-center text-center w-100 h5 font-weight-bold ">
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle text-dark bold
                                       " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                   NEW ARRIVALS

                               </a>
                               <div id="result"></div>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item mb-1" href="{{route('product.select.type',['type'=>'0.BACKPACKS & BAGS','count'=>'5'])}}">BACKPACKS&BAGS</a>
                                        <a class="dropdown-item mb-1" href="{{route('product.select.type',['type'=>'0.MENS','count'=>'5'])}}">MEN'S</a>
                                        <a class="dropdown-item mb-1" href="{{route('product.select.type',['type'=>'0.WOMENS','count'=>'5'])}}">WOMEN'S</a>
                                        <a class="dropdown-item mb-1" href="#">ACCESSORIES</a>
                                        <a class="dropdown-item mb-1" href="#">TECH WOOL</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('product.select',['count'=>'5'])}}">ALL</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown ml-3">
                                    <a class="nav-link dropdown-toggle text-dark bold " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">BACKPACKS&BAGS</a>
                                    <div class="dropdown-menu dropdown-menu-large row ">
                                        <a class="dropdown-item w-100" href="{{route('product.select.type',['type'=>'WORK BAGS.BACKPACKS & BAGS','count'=>'5'])}}">WORK BAGS</a>
                                        <a class="dropdown-item"  href="{{route('product.select.type',['type'=>'TRAVEL BAGS.BACKPACKS & BAGS','count'=>'5'])}}">TRAVEL BAGS</a>
                                        <a class="dropdown-item" href="{{route('product.select.type',['type'=>'BACKPACKS.BACKPACKS & BAGS','count'=>'5'])}}">BACKPACKS</a>
                                        <a class="dropdown-item" href="{{route('product.select.type',['type'=>'SHOP BY STYLE.BACKPACKS & BAGS','count'=>'5'])}}">SHOP BY STYLE</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('product.select.type',['type'=>'0.BACKPACKS & BAGS','count'=>'5'])}}">ALL</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown ml-3">
                                    <a class="nav-link dropdown-toggle text-dark bold " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">MEN'S</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('product.select.type',['type'=>'TOPS.MENS','count'=>'5'])}}">TOPS</a>
                                        <a class="dropdown-item" href="{{route('product.select.type',['type'=>'BOTTOMS.MENS','count'=>'5'])}}">BOTTOMS</a>
                                        <a class="dropdown-item" href="{{route('product.select.type',['type'=>'COATS & JACKETS.MENS','count'=>'5'])}}">COATS & JACKETS</a>
                                        <a class="dropdown-item" href="{{route('product.select.type',['type'=>'HATS & ACCESSORIES.MENS','count'=>'5'])}}">HATS & ACCESSORIES</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('product.select.type',['type'=>'0.MENS','count'=>'5'])}}">ALL</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown ml-3">
                                    <a class="nav-link dropdown-toggle text-dark bold " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">WOMEN'S</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('product.select.type',['type'=>'TOPS.WOMENS','count'=>'5'])}}">TOPS</a>
                                        <a class="dropdown-item" href="{{route('product.select.type',['type'=>'BOTTOMS.WOMENS','count'=>'5'])}}">BOTTOMS</a>
                                        <a class="dropdown-item" href="{{route('product.select.type',['type'=>'COATS & JACKETS.WOMENS','count'=>'5'])}}">COATS & JACKETS</a>
                                        <a class="dropdown-item" href="{{route('product.select.type',['type'=>'HATS & ACCESSORIES.WOMENS','count'=>'5'])}}">HATS & ACCESSORIES</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('product.select.type',['type'=>'0.WOMENS','count'=>'5'])}}">ALL</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown ml-3">
                                    <a class="nav-link dropdown-toggle text-dark bold " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">TRAVEL</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item mb-1" href="#">ONE BAGE TRAVEL</a>
                                        <a class="dropdown-item mb-1" href="#">TRAVEL ORGANIZATION</a>
                                        <a class="dropdown-item mb-1" href="#">VERSATILE TRAVEL CLOTHIN</a>
                                        <a class="dropdown-item mb-1" href="#">CAMERA KITS</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown ml-3">
                                    <a class="nav-link dropdown-toggle text-dark bold " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ON THE MAP</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item mb-1" href="#">ABOUT US</a>
                                        <a class="dropdown-item mb-1" href="#">IN THE WILD</a>
                                        <a class="dropdown-item mb-1" href="#">MANUFACTURING</a>
                                        <a class="dropdown-item mb-1" href="#">MAP PACT</a>
                                        <a class="dropdown-item" href="#">WARRANTY & REPAIRS</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>




                <div class="container-fluid bg-white mydivclass">
                    <div class="row ">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8 ">
                            <div class="collapse multi-collapse " id="multiCollapseExample1">
                                <div class="card card-body border-0">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text " id="inputGroup-sizing-default"><img src="{{asset('imgsite/lupa.png')}}" class="img-responsive" width="15px"></span>
                                        </div>
                                        <input type="text" class="form-control border-top-0 border-right-0" placeholder="Search for products"aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
                <div class="modal fade " id="SinginModal" tabindex="-1" role="dialog" aria-labelledby="SinginModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header  ">
                                <p class="text-center"> <h4 class="modal-title " id="Sing inModalLabel">Sing in</h4></p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body ">
                                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                    @csrf
                                    Email Address* <br/>
                                    <div class="input-group mb-3">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                        <!--<input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">-->
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    Password* <br/>
                                    <div class="input-group mb-3">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                        <!--<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">-->
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Lost Your Password?') }}
                                    </a>

                                    <!--<a href="#">Lost your password?</a>-->
                                    <br/><br/>
                                    <!--                                    <button type="submit" class="btn btn-primary">
                                                                        {{ __('Login') }}
                                                                    </button>-->
                                    <button type="submit" class="btn-lg btn-info btn-block  mb-3 " >SING IN</button>

                                </form>
                                <p class="text-center">Don't have an account?</p>
                                <a href="#"  data-toggle="modal" data-target="#CreateAcountModal" data-dismiss="modal" ><button type="button" class="btn-lg btn-light btn-block mb-3 "  >CREATE ACCOUNT</button></a>
                                <p class="text-center">Or login with</p>
                                <div class="row">
                                    <div class="col-3"></button></div>
                                    <div class="col-6">
                                        <a href="{{ url('/auth/google') }}"> <button type="button" class="btn btn-sm bg-white m-2 p-0 ml-3"  ><img src="{{asset('imgsite/gicon.png')}}" class="img-fluid"  width="40px" /></button></a><!--{{ url('/auth/facebook') }}-->
                                         <button type="button" class="btn btn-sm bg-white "  ><img src="{{asset('imgsite/ficon.png')}}" class="img-fluid"  width="40px" /> </button>
                                        <button type="button" class="btn btn-sm bg-white "  ><img src="{{asset('imgsite/iicon.png')}}" class="img-fluid"  width="40px" /></button>
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <h5 class="font-weight-bold m-0 "><font size="2">By clicking any of the social login buttons you agree to the terms of privacy policy described <a href="privacy" >here.</a></font>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal align-content-end" id="CreateAcountModal" tabindex="-1" role="dialog" aria-labelledby="CreateAcountModalLabel" aria-hidden="true">
                    <div class="modal-dialog   " role="document">
                        <div class="modal-content">
                            <div class="modal-header  ">
                                <p class="text-center"> <h4 class="modal-title " id="CreateAcountModalLabel">CreateAcount</h4></p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body ">
                                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                    @csrf
                                    Name* <br/>
                                    <div class="input-group mb-3">
                                        <!--<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">-->
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    Email Address* <br/>
                                    <div class="input-group mb-3">
                                        <!--<input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">-->
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    Password* <br/>
                                    <div class="input-group mb-3">
                                        <!--<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">-->
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    Confirm Password <br/>
                                    <div class="input-group mb-3">
                                        <!--<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">-->
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div><br/>
                                    <button type="submit" class="btn-lg btn-info btn-block  mb-3 " >CREATE ACCOUNT</button>
                                </form>
                                <p class="text-center">Already have an account?</p><a href="#"  data-toggle="modal" data-target="#SinginModal" data-dismiss="modal" >
                                    <button type="button" class="btn-lg btn-light btn-block mb-3 "  >SING IN</button></a>
                                <p class="text-center">Or create an account with</p>
                                <div class="row">
                                    <div class="col-3"></button></div>
                                    <div class="col-6">
                                        <a href="{{ url('/auth/google') }}"> <button type="button" class="btn btn-sm bg-white m-2 p-0 ml-3"  ><img src="{{asset('imgsite/gicon.png')}}" class="img-fluid"  width="40px" /></button></a><!--{{ url('/auth/facebook') }}-->
                                         <button type="button" class="btn btn-sm bg-white "  ><img src="{{asset('imgsite/ficon.png')}}" class="img-fluid"  width="40px" /> </button>
                                        <button type="button" class="btn btn-sm bg-white "  ><img src="{{asset('imgsite/iicon.png')}}" class="img-fluid"  width="40px" /></button>
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                                <h5 class="font-weight-bold m-0 "><font size="2">By clicking any of the social login buttons you agree to the terms of privacy policy described <a href="privacy" >here.</a></font>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container demo">
                    <!-- Modal -->
                    <div class="modal right fade" id="myModal2" class="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header d-block text-white bg-dark align-content-start" style="position: relative; z-index: 2000;">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="modal-title align-content-start pt-1 " id="myModalLabel2">YOUR CART</h4></div>
                                        <div class="col-6">
                                            <button type="button" class="close text-white pt-3 " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-body " style="width: 400px;">
                                    <div class="container-fluid   ">
                                        @if(Session::has('cart'))
                                        @foreach($cart=Session::get('cart')->items; as $product)
                                        <div class="row ">
                                            <div class="col-4 "><img class="activator img-fluid "  src="{{asset( $product['item']['img_folder'])}}">
                                            </div>
                                            <div class="col-6">
                                                <h5 class="font-weight-bold m-0 mb-3"><font size="3.5">{{ $product['item']['name']}}</font></h5>
                                                <span class="badge badge-danger">{{ $product['qty']}}</span>
                                                <p class="m-0"> <font size="2">BLUE</font></p>
                                                <p class="m-0"><font size="2">LARGE</font></p>

                                            </div>
                                            <div class="col-2 ">
                                                <a href="{{route('product.reduceByOne', ['id'=> $product['item']['idproduct']])}}" class="btn btn-danger btn-sm mb-5 ml-2">X</a>

                                                <input class="w-10 m-0  font-weight-bold border-0" size="20" type="text" name="" value="${{ $product['price']}}" readonly=""
                                                       style="width: 54px;">
                                            </div>
                                        </div><hr>
                                        @endforeach
                                        @endif

                                        <hr>
                                        <div class="row d-block">
                                            <div class="form-group">
                                                <label for="comment" class="m-0">Special Instructions:</label>
                                                <textarea class="form-control" rows="2" id="comment"></textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row m-0">
                                            <div class="col-6">
                                                <h5 class="font-weight-bold m-0 "><font size="4">SUBTOTAL:</font></h5></div>
                                            <div class="col-6">

                                                <h5 class="font-weight-bold m-0  float-right"><font size="4">${{ Session::has('cart') ? Session::get('cart')->totalPrice : ''}}</font></h5>

                                            </div>
                                        </div>
                                        <hr>
                                        @guest
                                        <a href="{{ route('checkout') }}"><button type="button" class="btn btn-info btn-block mb-3 "  >CHECKOUT AS GUEST</button></a>
                                        <a  href="{{ route('home_reg',['id'=> 'login']) }}"><button type="button" class="btn btn-success  btn-block  mb-3 " >LOG IN/CREATE ACCOUNT</button></a><br/>
                                         @else
                                          <a href="{{ route('checkout') }}"><button type="button" class="btn btn-success btn-block mb-3 "  >CHECKOUT </button></a>
                                          @endguest
                                        <h5 class="font-weight-bold m-0 "><font size="2">Login or create an account to track your order status.</font></h5><br/>
                                        <p align="center"><a href="{{ route('view_cart')}}"  >View Cart</a></p>
                                    </div>
                                </div>

                            </div><!-- modal-content -->
                        </div><!-- modal-dialog -->
                    </div><!-- modal -->


                </div><!-- container -->
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
                    
                    $(document).ready(function() {
        load_data();
        function load_data()
        {
            $.ajax({
                url: "{{ route('dropdown') }}",
                method: "GET",
                dataType: "html"
                success: function(data) {
                    $('#result').html(data);
                }
            })
        }
    });
                </script>
                <style>

                    .mydivclass {overflow-x: hidden; overflow-y: auto;}
                    .shrink:active
                    {
                        -webkit-transform: scale(0.8);
                        -ms-transform: scale(0.8);
                        transform: scale(0.8);
                    }
                    .modal.right .modal-dialog {
                        position: fixed;
                        margin: auto;
                        width: 430px;
                        height: 100%;
                        -webkit-transform: translate3d(0%, 0, 0);
                        -ms-transform: translate3d(0%, 0, 0);
                        -o-transform: translate3d(0%, 0, 0);
                        transform: translate3d(0%, 0, 0);
                    }
                    .modal.right .modal-content {
                        height: 100%;
                        overflow-y: auto;
                    }
                    .modal.right .modal-body {
                        padding: 15px 15px 80px;
                    }

                    .modal.right.fade .modal-dialog {
                        right: -0px;
                        -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
                        -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
                        -o-transition: opacity 0.3s linear, right 0.3s ease-out;
                        transition: opacity 0.3s linear, right 0.3s ease-out;
                    }

                    .modal.right.fade.in .modal-dialog {
                        right: 0;
                    }

                    /* ----- MODAL STYLE ----- */
                    .modal-content {
                        border-radius: 2%;
                        border: none;
                    }

                    .containertextpic {
                        position: relative;
                        text-align: center;
                        color: white;
                    }
                    .centeredtextpic {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                    }
                    /* FOR FOOTER*/
                    html, body {
                        height: 100%;
                        margin: 0;
                    }
                    .content {
                        min-height: 100%;
                    }
                    .content-inside {
                        padding: 20px;
                        padding-bottom: 50px;
                    }
                    .footer {
                        height: 200px;
                        margin-top: -50px;
                    }
                    /*NV*/
                    @media screen and (min-width: 576px) {
                        .has-mega-menu .container-sm {
                            width: 540px;
                        }
                    }

                    @media screen and (min-width: 768px) {
                        .has-mega-menu .container-md {
                            width: 720px;
                        }
                    }

                    @media screen and (min-width: 992px) {
                        .has-mega-menu .container-lg {
                            width: 960px;
                        }
                    }

                    @media screen and (min-width: 1200px) {
                        .has-mega-menu .container-xl {
                            width: 1140px;
                        }
                    }
                    .navbar-toggler{
                        border-color: black;
                    }
                    /* FOR RATING */
                    .rating-header {
                        margin-top: -10px;
                        margin-bottom: 10px;
                    }

                </style>
                <script src="{{ asset('js/app.js') }}"></script>
                <!--<script src="{{ 'js/bootstrap-navbar-toggle.js' }}"></script>-->

                <script type="text/javascript">
                                                               if (window.location.href.indexOf("login") > -1) {
                                                                   $('#SinginModal').modal('show');
                                                               }

                                                               if (window.location.href.indexOf("register") > -1) {
                                                                   $('#CreateAcountModal').modal('show');
                                                               }
                </script>
                @if(!empty(Session::get('error_code')) && Session::get('error_code') == 16)

                <script>$('#myModal2').modal('show')</script>
                @endif


