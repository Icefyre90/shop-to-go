
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Product table</li>
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
                        <strong class="card-title">Product Table &nbsp&nbsp</strong>
                        <a class="btn btn-primary " href="{{route('products.edit',['id'=> '0'])}}" role="button">Input new Product</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>                               
                                 <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->idproduct}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category_menu}}-{{$product->category}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>${{$product->price}}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ URL('/admin_products_edit/'.$product->idproduct )}}" role="button">Edit</a> &nbsp
                                        <a class="btn btn-danger btn-sm" href="{{ URL('/admin_products_delete/'.$product->idproduct )}}" role="button">Delete</a>

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


<script src="{{ 'js/backend_js/vendor/jquery-2.1.4.min.js' }}"></script>
<script src="{{ 'js/backend_js/popper.min.js' }}"></script>
<script src="{{ 'js/backend_js/plugins.js' }}"></script>
<script src="{{ 'js/backend_js/main.js' }}"></script>




<script type="text/javascript">
$(document).ready(function() {
    $('#bootstrap-data-table-export').DataTable();
});
</script>


@endsection
