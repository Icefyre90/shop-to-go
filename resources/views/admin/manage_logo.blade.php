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
                    <li class="active"><a href="#">Logos</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
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
<div class="content mt-3">
    
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"> LOGO TABLE &nbsp&nbsp&nbsp----</strong>
                        <a class="btn btn-primary " href="{{route('logo.edit',['id'=> '0'])}}" role="button">Create new Logo</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="max-width: 80px;">Number</th>
                                    <th >Logo title</th>
                                    <th >Logo image</th>
                                    <th >Favicon image</th>
                                    <th >In use</th>
                                    <th style="min-width: 100px;">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logo as $logo)
                                <tr>
                                    <td>{{ $logo->id}}</td>
                                    <td>{{ $logo->title}}</td>
                                    <td>
                                        <div class="thumbnail">
        <img src="{{ asset($logo->logo_image) }}" claalt="Lights" class="img-responsive" style="max-width: 100%; max-height: 200px; min-width: 15px;">
    </div></td>
                                    <td><img src="{{ asset($logo->favicon_image) }}" claalt="Lights" class="img-responsive" style="max-width: 100%; max-height: 200px; min-width: 15px;">
                                    </td>
                                    <td>{{ $logo->in_use}}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ URL('/admin_logo_edit/'.$logo->id )}}" role="button">Edit</a> &nbsp
                                        <a class="btn btn-danger btn-sm" href="{{ URL('/admin_logo_delete/'.$logo->id )}}" role="button">Delete</a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="{{ asset( 'js/backend_js/vendor/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('js/backend_js/popper.min.js') }}"></script>
<script src="{{ asset('js/backend_js/plugins.js') }}"></script>
<script src="{{ asset('js/backend_js/main.js' )}}"></script>






@endsection