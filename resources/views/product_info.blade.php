@include ('temps.home_header')
<div class="container-fluid  bg-white mb-5">
	<div class="row mt-5 align-items-center"> @foreach($product as $product)
			<div class="card border col-md-7 p-0""><div>
  <img class="card-img-top" src="{{asset($product->img_folder)}}" alt="Card image cap"></div>
  <div class="row">
  	<div class="border col-3 m-0 p-0">
  		<img class="card-img-top" src="{{asset($product->img_folder)}}" >
  	</div>
  	<div class="border col-3 m-0 p-0">
  		<img class="card-img-top" src="{{asset($product->img_folder)}}">
  	</div>
  	<div class="border col-3 m-0 p-0">
  		<img class="card-img-top" src="{{asset($product->img_folder)}}" >
  	</div>
  	<div class="border col-3 m-0 p-0">
  		<img class="card-img-top" src="{{asset($product->img_folder)}}" >
  	</div>
  </div>
  <div class="card-body text-center border m-0 ">
  	
    <h5 class="card-title font-weight-bold">{{$product->name}}</h5>
    <p class="card-text font-weight-bold">{{$product->description}}</p>
</div>
</div>
		<div class="col-md-5">
			<div class="container d-block h-100"><form method="post" action="{{ route('product.addToCart', ['id '=> $product->idproduct])}}">
				<div class="row ">
					<div class="col-12">
						<h1 class=" font-weight-bold">{{$product->name}}</h1>
						<p class=" font-weight-bold"><h3 class=" font-weight-bold">{{$product->price}}$</h3></p>
						<p class=" font-weight-bold"><h5 class="text-success font-weight-bold">Only {{$product->quantity}} left</h5></p>

					</div>
				</div>
				<div class="row m-0 mt-3 p-0 ">
					<div class="input-group mb-3">
 						 <div class="input-group-prepend">
   							  <label class="input-group-text bg-white font-weight-bold border-top-0 border-bottom-0 border-left-0" for="inputGroupSelect03">COLOR :&nbsp &nbsp </label>
  						</div>
  						<select class="custom-select font-weight-bold" id="inputGroupSelect03">
  						  <option selected>Choose...</option>
   							 <option value="1" class="font-weight-bold">One</option>
   							 <option value="2" class="font-weight-bold">Two</option>
  							  <option value="3" class="font-weight-bold">Three</option>
  						</select>
					</div>
				</div>
				<div class="row m-0 p-0 ">
					<div class="input-group mb-3">
 						 <div class="input-group-prepend">
   							  <label class="input-group-text bg-white font-weight-bold border-0" for="inputGroupSelect03">SIZE :&nbsp &nbsp &nbsp &nbsp&nbsp</label>
  						</div>
  						<select class="custom-select font-weight-bold" id="inputGroupSelect03">
  						  <option selected>Choose...</option>
   							 <option value="1" class="font-weight-bold">One</option>
   							 <option value="2" class="font-weight-bold">Two</option>
  							  <option value="3" class="font-weight-bold">Three</option>
  							  <option value="1" class="font-weight-bold">One</option>
   							 <option value="2" class="font-weight-bold">Two</option>
  							  <option value="3" class="font-weight-bold">Three</option>
  						</select>
					</div>
				</div>
				<div class="row m-0 p-0 ">
					<div class="input-group mb-3">
 						 <div class="input-group-prepend">
   							  <label class="input-group-text bg-white font-weight-bold border-0" for="inputGroupSelect03">NUMBER:</label>
  						</div>
  						<input class="form-control font-weight-bold" type="number" value="1" id="example-number-input">
					</div>
				</div>
				<div class="row m-0 mt-3 p-0 ">
					<div class="col-12 justify-content-center ">
				<!-- <button type="submit" class="btn btn-lg  w-100  btn-primary d-block">ADD TO CART</button> -->
				 <a type="button"  class="btn btn-lg  w-100  btn-primary d-block" href="{{ route('product.addToCart', ['id '=> $product->idproduct])}}" class="btn btn-primary">ADD TO CART</a>
			</div>
			</div></form>
			<div>
<a class="btn " data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2">
	<button type="button" class="btn btn-link pr-1">Write a review</button></a>
			</div>
			<div class="row">
				<div class="collapse multi-collapse w-100" id="multiCollapseExample2">
                
                <div class=" row mb-1">
  <label for="text-input-rev-n" class="col-2 col-form-label">NAME:</label>
  <div class="col-10">
    <input class="form-control" type="text" value="" id="text-input-rev-n">
  </div>
</div>
<div class=" row mb-1">
  <label for="text-input-rev-t" class="col-2 col-form-label">TITLE:</label>
  <div class="col-10">
    <input class="form-control" type="text" value="" id="text-input-rev-t">
  </div>
</div>
<div class=" row mb-1">
  <label for="text-input-rev-r" class="col-2 col-form-label">REVIEW:</label>
  <div class="col-10">
    <textarea class="form-control" id="text-input-rev-r" rows="3"></textarea>
  </div>
</div>
<div class=" row mb-1">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<div class="form-group" id="rating-ability-wrapper">
	    <label class="control-label" for="rating">
	    <span class="field-label-header">How would you rate this item?*</span><br>
	    <span class="field-label-info"></span>
	    <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
	    </label>
	    <h2 class="bold rating-header" style="">
	    <span class="selected-rating">0</span><small> / 5</small>
	    </h2>
	    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
	        <i class="fa fa-star" aria-hidden="true"></i>
	    </button>
	    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
	        <i class="fa fa-star" aria-hidden="true"></i>
	    </button>
	    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
	        <i class="fa fa-star" aria-hidden="true"></i>
	    </button>
	    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
	        <i class="fa fa-star" aria-hidden="true"></i>
	    </button>
	    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
	        <i class="fa fa-star" aria-hidden="true"></i>
	    </button>
	</div>
</div>
@endforeach
            </div>
        </div>
		</div>
			
			
		</div>
	</div>
</div>

<script>
		jQuery(document).ready(function($){
	    
	$(".btnrating").on('click',(function(e) {
	
	var previous_value = $("#selected_rating").val();
	
	var selected_value = $(this).attr("data-attr");
	$("#selected_rating").val(selected_value);
	
	$(".selected-rating").empty();
	$(".selected-rating").html(selected_value);
	
	for (i = 1; i <= selected_value; ++i) {
	$("#rating-star-"+i).toggleClass('btn-danger');
	$("#rating-star-"+i).toggleClass('btn-default');
	}
	
	for (ix = 1; ix <= previous_value; ++ix) {
	$("#rating-star-"+ix).toggleClass('btn-danger');
	$("#rating-star-"+ix).toggleClass('btn-default');
	}
	
	}));
	
		
});
</script>
@include("temps/footer")