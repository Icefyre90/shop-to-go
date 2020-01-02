<?php ?>

@include ('temps.home_header')
<div class="container-fluid bg-white ">
    <div class="mydivclass">
        <div id="carouselExampleIndicators" class="carousel slide mydivclass" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner mt-5">

               <?php
               $i=0;
               if ($images!=" "){
               foreach($images as $image){
                $alt = array('First','Second','Third','Fourth', 'Fifth','Sixth' );
                $first='First';
                $Second='Second';
                $Third='Third';
                $slide='';
                $active=0;
                $status='';
                switch ($i) {
                       case $i:
                          $slide=$alt[$i];
                        break;
                }
  if($active==$i){
  $status='active';
  }else{
  $status='';
  }

  $text=explode(".",$image->text);
  $text1=$text['0'];
  $text2=$text['1'];
?>
                <div class="carousel-item {{$status}}">
                    <img class="d-block w-100 img-fluid " src=" {{ asset($image->img_site) }}" alt="{{$slide}} slide">
                    <div class="carousel-caption   d-none d-md-block ">
                        <h1 class="Display-4 mb-5 font-weight-bold">{{$text1}}
                        </h1>
                        <h1 class=" mb-5 font-weight-bold" >{{$text2}}</h1>
                    </div>
                </div>
               <?php $i=+1; 
};};
               ?>
            </div>
            <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container-fluid bg-white">
            <div class="row ">
                <div class="col-sm-4 p-0" >
                    <div class="containertextpic"><img class="img-fluid" src="//cdn.shopify.com/s/files/1/0277/0693/files/42100204140_8f7e5f72f7_o_2048x.jpg?v=1534294360 2048w"/>
                      <div class="centeredtextpic"><h1 class="font-weight-bold" >MEN'S APPAREL</h1><br/><a href="{{route('product.select.type',['type'=>'0.MENS','count'=>'5'])}}"><button class="btn btn-primary">Shop now</button></a></div>
                  </div>

              </div>
              <div class="col-sm-4 p-0 hidden-md-up">
                <div class="containertextpic"><img class="img-fluid" src="//cdn.shopify.com/s/files/1/0277/0693/files/29095545257_450fcc0af4_o_2048x.jpg?v=1534294384 2048w"/>
                  <div class="centeredtextpic"><h1  class="font-weight-bold">WOMEN'S APPAREL</h1><br/><a href="{{route('product.select.type',['type'=>'0.WOMENS','count'=>'5'])}}"><button class="btn btn-primary">Shop now</button></a></div>
              </div>

          </div>
          <div class="col-sm-4  p-0  hidden-md-up">
             <div class="containertextpic"><img class="img-fluid" src="//cdn.shopify.com/s/files/1/0277/0693/files/33996151191_abcf637f01_o_2048x.jpg?v=1534294400 2048w"/>
              <div class="centeredtextpic"><h1 class="font-weight-bold">BACKPACKS & BAGS</h1><br/><a href="{{route('product.select.type',['type'=>'0.BACKPACKS & BAGS','count'=>'5'])}}" ><button class="btn btn-primary">Shop now</button></a></div>
          </div>
      </div>
  </div>
  <div class="row"> <div class="col-12 "><h1 class="text-center font-weight-bold mt-5 mb-2" >NEW ARIVALL</h1></div></div>
  <div class="row"><!--  style="width: 18rem; -->
    <div class="card  border-0  col-sm-3"">
      <img class="card-img-top" src="{{asset('imgsite/art4.jpg')}}" alt="Card image cap">
      <div class="card-body text-center ">
        <h5 class="card-title font-weight-bold">GLOBAL SWEATER - MEN'S</h5>
        <p class="card-text font-weight-bold">$149.00</p>
    </div>
</div>
<div class="card border-0 col-sm-3">
    <img class="card-img-top" src="{{asset('imgsite/art3.jpg')}}" alt="Card image cap">
    <div class="card-body text-center">
        <h5 class="card-title font-weight-bold">TECH TRENCH 3L - WOMEN'S</h5>
        <p class="card-text font-weight-bold">$229.00</p>
    </div>
</div>
<div class="card border-0 col-sm-3"">
  <img class="card-img-top" src="{{asset('imgsite/art1.jpg')}}" alt="Card image cap">
  <div class="card-body text-center">
    <h5 class="card-title font-weight-bold">CHAMBRAY SHIRT - MEN'S</h5>
    <p class="card-text font-weight-bold">$139.00</p>
</div>
</div>
        <div class="card border-0 col-sm-3"">
  <img class="card-img-top" src="{{asset('imgsite/art2.jpg')}}" alt="Card image cap">
  <div class="card-body text-center">
    <h5 class="card-title font-weight-bold">MOUNTAIN FLEECE - WOMEN'S</h5>
    <p class="card-text font-weight-bold">$149.00</p>
</div>
</div>
</div>  
    <div class="container-fluid">
        <div class="row mt-5 align-items-center"> 
            <div class="col-sm-6 p-0">
                <img class="d-block w-100 img-fluid" src="{{asset('imgsite/oneside2.jpg')}}">
            </div>
            <div class="col-sm-6 p-0">
                <div class="card card-block text-center border-0">
                   <h1 class="Display-4 font-weight-bold">CORE PACK</h1> <br/>
                   <h2>Your ultimate core carry.</h2><br/>
                   <div class="container-fluid">
                   <a href="{{route('product.select.type',['type'=>'0.BACKPACKS & BAGS','count'=>'5'])}}"><button class="btn btn-primary btn-lg d-inline-block " >Shop now</button></a>
                   </div>
                </div>
            </div>
         </div>
        <div class="row align-items-center" > 
            <div class="col-sm-6 p-0 ">
                <div class="card card-block text-center border-0">
                   <h1 class="Display-4 font-weight-bold">CHAMBRAY SHIRT</h1> <br/>
                   <h2>100% organic cotton. 100% classic.</h2><br/>
                   <div class="container-fluid">
                   <a href="{{route('product.select.type',['type'=>'0.MENS','count'=>'5'])}}">
                   <button class="btn btn-primary btn-lg d-inline-block " >Shop now</button></a>
                   </div>
                </div>
            </div>
            <div class="col-sm-6 p-0">
                 <img class="d-block w-100 img-fluid" src="{{asset('imgsite/oneside1.jpg')}}">
            </div>
         </div>
     </div>
</div>
</div>
</div>


@include("temps/footer")