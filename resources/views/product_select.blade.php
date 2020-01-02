@include ('temps.home_header')
<div class="container-fluid bg-white ">
    <script>


        function promeni () {
                var thx=$('#screen').val();
                if(history.pushState){
                    var k=window.location;
                    k=k.toString();
                    var p=k.split('/');
                    var s=p.pop();
                    var t=p;   
                    var y="";           
                    for(i=0; i<t.length; i++){

                         y += t[i]+'/';
                    };
                    y +=thx;
                   window.location.href = y;
                };
              /*  return false;*/
            };
     /*function processAjaxData(response, urlPath){
     document.getElementById("content").innerHTML = response.html;
     document.title = response.pageTitle;
     window.history.pushState({"html":response.html,"pageTitle":response.pageTitle},"", urlPath);
 }*/
</script>
<select class="custom-select col-md-2" searchable="Search here.." id="screen" onchange="promeni()">
  <option value="" disabled selected>Number of item</option>
  <option value="5">5</option>
  <option value="10">10</option>
  <option value="15">15</option>
  <option value="20">20</option>
  <option value="50">50</option>
</select>
    @if($products!=" ")
    @foreach($products->chunk(5) as $productChank)
    <div class="row mt-5 align-items-center justify-content-md-center">

        @foreach($productChank as $product)
        <div class="card border-0 p-0 m-0 col-md-2 "">
            <a href="{{route('product.info',['id'=> $product->idproduct])}}">
              
            <img class="card-img-top" src="{{ asset($product->img_folder)}}" class="img-fluid" id="img-select" alt="Card image cap">
            
            <div class="card-body text-center">
                <h5 class="card-title font-weight-bold text-dark">{{ strtoupper($product->name)}}</h5>
                <h5 class="card-text font-weight-bold">{{ $product->price}}$</h5>
               
            </div>
        </a>
        </div>  

        @endforeach


    </div>

    @endforeach
    @else
    <P> there is no item </P>
    @endif
    <div class="row mt-1 mb-5 justify-content-md-center ">
        <div class="col-sm-auto"> {{ $products->links() }}
        </div> 
   
</div>
</div>
<style>
#img-select:hover {
  filter: alpha(opacity=50); 
  opacity: 0.7;
}

</style>
@include("temps/footer")