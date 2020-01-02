<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
//use App\Http\Request;
use DB;
use Session;

/**
 * Description of ProductController
 *
 * @author icefy
 */
class ProductController extends Controller {

    public function getIndex($count) {
        $products = Product::paginate($count);
        return view('product_select', ['products' => $products]);
    }
    public function getIndextype(Request $request, $type,$count) {
        $submenu=explode(".",$type);
        $submenu1=$submenu['0'];
        $submenu2=$submenu['1'];
        
        if($submenu1=="0"){
            $products = DB::table('products')
        ->join('product_type','type','=','idproduct_type')
        ->where('category_menu',$submenu2)
        ->paginate($count);
        return view('product_select', ['products' => $products]);
       
        }else{
            $products = DB::table('products')
        
        ->join('product_type','type','=','idproduct_type')
        ->where('category',$submenu1)
        ->where('category_menu',$submenu2)
        ->paginate($count);
        return view('product_select', ['products' => $products]);
        }
       

    }

    public function getAddToCart(Request $request, $id) {
        $idproduct = $id;
        $product = Product::where('idproduct', $id)->get()->first();

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->idproduct);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }


        return redirect()->back()->with('error_code', 16);
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
        ;
    }

    public function product_info($id){
        $product = Product::where('idproduct',$id)->get();
        return view('product_info',['product' => $product]);
    }

}
