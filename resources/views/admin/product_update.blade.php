@extends('layouts.adminlayout.admin_dasboard')
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('admin_das')}}">Dashboard</a></li>
                    <li><a href="{{route('products_table')}}">Products</a></li>
                    <li class="active">
                        {{ isset($product) ? 'Edit Product': 'Add Product' }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class = "content mt-3">
    <div class = "animated fadeIn">
        <div class = "row">

<style>
    img{
  max-width:180px;
}
</style><script src="https://unpkg.com/file-upload-with-preview"></script> 
        <!-- <script>
            var upload = new FileUploadWithPreview('myUniqueUploadId');
        </script> -->
            <div class = "col-md-12">
                <div class = "card">
                    <div class = "card-header">
                        <strong class = "card-title">  {{ isset($product) ? 'EDIT PRODUCT': 'ADD PRODUCT' }} </strong>
                    </div>
                    
                    <div class = "card-body">
                               
                                @if(isset($product))
                                @foreach($product as $product)
                 <form action = "{{route('products.update',$product->idproduct)}}" method = "POST" enctype = "multipart/form-data" class = "form-horizontal"> {{csrf_field()}}
                            <div class = "card-body card-block">
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "text-input" class = " form-control-label">Product name</label></div>
                                    <div class = "col-12 col-md-9 col-lg-9"><input type = "text" id = "text-input" name = "name" value="{{$product['name']}}" placeholder = "name" class = "form-control" required=""><small class = "form-text text-muted"></small></div>
                                </div>
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "text-input" class = " form-control-label">Product description</label></div>
                                    <div class = "col-12 col-md-9 col-lg-9"><input type = "text"  name = "description" value="{{$product['description']}}" placeholder = "description" class = "form-control" required=""><small class = "form-text text-muted"></small></div>
                                </div>
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "image" class = " form-control-label">Product image</label></div>
                                    <div class = "col-12 col-md-9 col-lg-9"><input type = "file" id = "file-input" name = "image"  value="{{$product['img_folder']}}" class = "form-control-file"  
                                     ></div>
                                    <div class = "col col-md-3 col-lg-2"></div><div class = "col-12 col-md-9 col-lg-9"> <img id="first" src="{{ asset($product->img_folder) }}"  alt="your image"  /></div>
                                </div>
                               <br/><br/>
                                
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "select" class = " form-control-label">Select</label></div>
                                    <div class = "col-12 col-md-9 col-lg-9">
                                        <select name="select" id="select" class="form-control" >
                                             <optgroup hidden="" label="">
                                                <option  disabled selected set hidden value="{{$product['type']}}">{{$product['type']}}</option>
                                             </optgroup>
                                    @foreach($select1 as $select1)
                                    <optgroup label="{{ $select1->category_menu}} {{$select1->category}}">
                                        <?php $result = json_decode($select2, true);?>
                                        

                                      @foreach($result as $result)
                                      <?php if($select1->category==$result['category'] && $select1->category_menu==$result['category_menu'] ){ ?><option value="{{$result['idproduct_type']}}">  <?php echo $result['sub_category'];} ?></option>
                                      @endforeach
                                    </optgroup>
                                    @endforeach 
                                </select>
                                    </div>
                                </div></br>
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "type" class = " form-control-label">Quantity</label></div>
                                
                                    <div class = "col-12 col-md-9 col-lg-9"><input type = "number" id = "number" name = "quantity" value="{{$product['quantity']}}" placeholder = "quantity" class = "form-control" required=""><small class = "form-text text-muted"></small></div>
                                </div>
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "type" class = " form-control-label">Price</label></div>
                                
                                    <div class = "col-12 col-md-9 col-lg-9"><input type = "number" id = "price" name = "price" value="{{$product['price']}}" placeholder = "price" class = "form-control" required=""><small class = "form-text text-muted"></small></div>
                                </div></br>
                                <div class = "card-footer">
                                <button type = "submit" class = "btn btn-primary btn-sm">
                                    <i class = "fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type = "reset" class = "btn btn-danger btn-sm">
                                    <i class = "fa fa-ban"></i> Reset
                                </button>
                            </div></form>

@endforeach

                 @else
                <form action = "{{route('products.update',['id'=> '0'])}}" method = "POST" enctype = "multipart/form-data" class = "form-horizontal"> {{csrf_field()}}
                            <div class = "card-body card-block">
                 <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "text-input" class = " form-control-label">Product name</label></div>
                                    <div class = "col-12 col-md-9 col-lg-9"><input type = "text" id = "text-input" name = "name" value="" placeholder = "title" class = "form-control" required=""><small class = "form-text text-muted"></small></div>
                                </div>
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "textarea-input" class = " form-control-label">Product description</label></div>
                                    <div class = "col-12 col-md-9 col-lg-9"><textarea name="description" id="description" rows="9" placeholder="Content..." class="form-control"></textarea><small class = "form-text text-muted"></small></div>
                                </div>
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "image" class = " form-control-label">Product image</label></div>
                                    <div class = "col-12 col-md-9 col-lg-9"><input type = "file"  name = "image"  value="" class = "form-control-file" required="" 
                                     ></div>
                                </div>
                               <br/>
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "type" class = " form-control-label">Product type</label></div>
                                <div class = "col-12 col-md-9 col-lg-9">

                                  <select name="select" id="select" class="form-control">
                                    @foreach($select1 as $select1)
                                    <optgroup label="{{ $select1->category_menu}} {{$select1->category}}">
                                        <?php $result = json_decode($select2, true);?>
                                      @foreach($result as $result)
                                      <?php if($select1->category==$result['category'] && $select1->category_menu==$result['category_menu'] ){ ?><option value="{{$result['idproduct_type']}}">  <?php echo $result['sub_category'];} ?></option>
                                      @endforeach
                                    </optgroup>
                                    @endforeach 
                                </select>

                                </div>
                                </div><br/>
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "type" class = " form-control-label">Quantity</label></div>
                                
                                    <div class = "col-12 col-md-9 col-lg-9"><input type = "number" id = "number" name = "quantity" value="" placeholder = "quantity" class = "form-control" required=""><small class = "form-text text-muted"></small></div>
                                </div>
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "type" class = " form-control-label">Price</label></div>
                                
                                    <div class = "col-12 col-md-9 col-lg-9"><input type = "number" id = "price" name = "price" value="" placeholder = "price" class = "form-control" required=""><small class = "form-text text-muted"></small></div>
                                </div>
                                <!-- <div class = "row form-group" >
                                    <div class = "col col-md-3 col-lg-2"><label for = "type" class = " form-control-label">Color</label></div>
                                
                                    <div class = "col-12 col-md-9 col-lg-9" >
                                        <input type="number" value='1' id='color-number-row' name='number-color-row' hidden="">

                                       <script type="text/javascript"> var nm=document.getElementById('color-number-row').value;
                                        for(var x = 1; x <=4; x++){ 
</script>
                                        <div class="row" id="color-chame" >
                                            <div class="col-2">

                                                 <select name="select-color" id="select-color" class="form-control" onchange="mycolor()">
                                                    <option>Choose color</option>
                                                     @foreach($color as $color)
                                                     <option value="{{$color->colornumber}}" id="id{{$color->colornumber}}" style="background: 
                                                     {{ $color->colornumber}} "
                                                     >{{$color->name}} </option>
                                                    @endforeach
                                        </select>
                                            </div>
                                            <div class="col-10">
                                                <div class="row">
                                                 <div class="col-2 m-0 p-0">
                                                    <input type="number" name="XS"  class="form-control" style="height: 40px"placeholder="XS">
                                                 </div>
                                                 <div class="col-2 m-0 p-0">
                                                    <input type="number" name="S"  class="form-control" style="height: 40px"placeholder="S">
                                                 </div>
                                                 <div class="col-2 m-0 p-0">
                                                <input type="number" name="M"  class="form-control" style="height: 40px"placeholder="M">
                                                 </div>
                                                 <div class="col-2 m-0 p-0">
                                                    <input type="number" name="L"  class="form-control" style="height: 40px"placeholder="L">
                                                 </div>
                                                 <div class="col-2 m-0 p-0">
                                                    <input type="number" name="XL"  class="form-control" style="height: 40px" placeholder="XL">
                                                 </div>
                                                 <div class="col-2 m-0 p-0">
                                                    <input type="number" name="XXL"  class="form-control" style="height: 40px" placeholder="XXL">
                                                 </div>

                                                
                                                </div>
                                            </div>
                                        </div>
                                        <script> "); }; </script>
                                    </div>

                                </div> -->
                               <!--  <div class = "row form-group" >
                                    <div class = "col col-md-3 col-lg-2"><label for = "type" class = " form-control-label"></label></div>
                                
                                    <div class = "col-12 col-md-9 col-lg-9" >
                                    <div class="row mt-3">
                                            <div class="col-12">
                                                <button class="btn btn-outline-dark m-0 "id="morecolor" onclick="duplicate()"><h3 class="m-0 p-0" >+</h3></button>
                                         </div>
                                    </div>
                                </div></div> -->
                              
                            <div class = "card-footer">
                                <button type = "submit" class = "btn btn-primary btn-sm">
                                    <i class = "fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type = "reset" class = "btn btn-danger btn-sm">
                                    <i class = "fa fa-ban"></i> Reset
                                </button>
                            </div> </form>@endif
                    </div>

                </div>
            </div>


        </div>
    </div><!--.animated -->
</div><!--.content -->
</div>
<script src="{{ asset( 'js/backend_js/vendor/jquery-2.1.4.min.js') }}"></script>
                            <script src="{{  asset('js/backend_js/popper.min.js') }}"></script>
                            <script src="{{  asset('js/backend_js/plugins.js') }}"></script>
                            <script src="{{  asset('js/backend_js/main.js' )}}"></script>
                            <script src="{{  asset('js/backend_js/lib/chosen/chosen.jquery.min.js' )}}"></script>

<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function mycolor() {
  var x = document.getElementById("select-color").value;
  document.getElementById("select-color").style.backgroundColor =  x;
};

function duplicate() {
    var T=parseInt(document.getElementById("color-number-row").value);
    document.getElementById("color-number-row").value = T +1;
}

</script>

                            @endsection