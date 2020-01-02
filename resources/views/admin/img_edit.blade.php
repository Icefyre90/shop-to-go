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
                    <li><a href="{{route('img_display',['type'=> $type])}}">Images</a></li>
                    <li class="active">
                        {{ isset($logo) ? 'Edit Logo': 'Add Logo' }}
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
</style>
            <div class = "col-md-12">
                <div class = "card">
                    <div class = "card-header">
                        <strong class = "card-title">  {{ isset($image) ? 'EDIT IMAGE': 'ADD IMAGE' }} </strong>
                    </div>
                    
                    <div class = "card-body">
                               
                                @if(isset($image))
                                @foreach($image as $image)
                  <form action = "{{ URL('/admin_img_update/'.$type,$image->id )}}" method = "POST" enctype = "multipart/form-data" class = "form-horizontal"> {{csrf_field()}}
                            <div class = "card-body card-block">
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "text-input" class = " form-control-label">Image text</label></div>
                                    <div class = "col-12 col-md-9 col-lg-9"><input type = "text" id = "text-input" name = "text" value="{{$image['text']}}" placeholder = "Text" class = "form-control" required=""><small class = "form-text text-muted"></small></div>
                                </div>
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "logo-image" class = " form-control-label">Image file</label></div>
                                    <div class = "col-12 col-md-9 col-lg-9"><input type = "file" id = "file-input" name = "image"  value="{{$image['img_site']}}" class = "form-control-file"  
                                     ></div>
                                    <div class = "col col-md-3 col-lg-2"></div><div class = "col-12 col-md-9 col-lg-9"> <img id="first" src="{{ asset($image->img_site) }}"  alt="your image"  /></div>
                                </div>
                               <br/><br/>
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "select" class = " form-control-label">Select</label></div>
                                    <div class = "col-12 col-md-9 col-lg-9">
                                        <select name = "select" id = "select" class = "form-control" required="">
                                            
                                            @if(isset($image['in_use']))
                                                @if($image['in_use']==1)
                                                    <option value = "{{$image['in_use']}}">
                                                    Active</option>
                                                    <option value = "0">Disable</option>
                                                 @else
                                                    <option value = "0">Disable</option>
                                                    <option value = "1">Active</option>
                                                @endif
                                            @else
                                                <option value = "">Please select</option>
                                                <option value = "1">Active</option>
                                                <option value = "0">Disable</option>
                                            @endif
                                            
                                        </select>
                                    </div>
                                </div>
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
                <form action = "{{ url('admin_img_update/'.$type,['id'=>'0'])}}" method = "POST" enctype = "multipart/form-data" class = "form-horizontal"> {{csrf_field()}}
                            <div class = "card-body card-block">
                 <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "text-input" class = " form-control-label">Text</label></div>
                                    <div class = "col-12 col-md-9 col-lg-9"><input type = "text" id = "text-input" name = "text" value="" placeholder = "title" class = "form-control" required=""><small class = "form-text text-muted"></small></div>
                                </div>
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "logo-image" class = " form-control-label">Image File</label></div>
                                    <div class = "col-12 col-md-9 col-lg-9"><input type = "file" id = "file-input" name = "image"  value="" class = "form-control-file" required="" 
                                     ></div>
                                </div>
                               <br/>
                            
                                
                                <div class = "row form-group">
                                    <div class = "col col-md-3 col-lg-2"><label for = "select" class = " form-control-label">Select</label></div>
                                    <div class = "col-12 col-md-9 col-lg-9">
                                        <select name = "select" id = "select" class = "form-control" required="">
                                                <option value = "">Please select</option>
                                                <option value = "1">Active</option>
                                                <option value = "0">Disable</option>
                                        </select>
                                    </div>
                                </div>   

                   </div>
                   
                              
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

<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>

                            @endsection