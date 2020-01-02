<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Image;
use Illuminate\Support\Facades\DB;
use Session;
class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $images=Image::where('in_use','1')->where('type','corusel')->get();
        
        foreach($images as $img){
        $path = storage_path($img->img_site);

    };
        return view('home_guest')->with('images', $images)->with('path', $path);
    }

    public function dropdown(){
        $category_menu=DB::select('select category_menu from product_type group by category_menu');
        $sub_category=DB::select('select * from product_type order by category_menu, category, sub_category');
        $dro='<p> smrda smrdic </p> ';
        echo $dro;
    }
    public function reg($i) {
        $images=Image::where('in_use','1')->where('type','corusel')->get();
        
        foreach($images as $img){
        $path = storage_path($img->img_site);

    }
        return view('home_guest')->with('images', $images)->with('path', $path);
    }

    public function checkout(){

        if(Session::has('cart')){
            
            
        return view('contact_information');
        }else{
        return view('view_cart');
        }

    }
    public function shipping_method(Request $request){
        if(Session::has('cart')){
            $email=$_POST['email'];
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $company="";
            if(isset($_POST['email'])){
                $company=$_POST['email'];
            };
            
            if(isset($_POST['apartmen'])){
                $apartmen=$_POST['apartmen'];
            }else{
                $apartmen="";
            };
            $addres=$_POST['addres'];
            $city=$_POST['city'];
            $country=$_POST['country'];
            $postal=$_POST['postal'];
            $phone=$_POST['phone'];

            $payment_info =  ['email' => $email, 'fname' => $fname,'lname' => $lname,'company' => $company,'apartmen' => $apartmen,'addres' => $addres,'city' => $city,'country' => $country,'postal' => $postal,'phone' => $phone];
            $payment_info=json_encode($payment_info);
            $request->session()->put('payment_info', $payment_info);
            /*$request->session()->put('payment_info', $payment_info);*/
        return view('shipping_method');
        }else{
        return view('view_cart');
        }


    }
    public function shipp_back()
    {
       if(Session::has('cart')){
        
        return view('shipping_method');
        }else{
        return view('view_cart');
        }
    }
    public function payment_method(Request $request){
        if(Session::has('cart')){
             $shipping_method="nestooooo";
             $payment_info=json_decode(Session::get('payment_info'));
             $payment_info = (object) array_merge( (array)$payment_info, array( 'shipping_method' => $shipping_method ) );
             
             /*$payment_info += [ "shipping_method" => $shipping_method ];*/
             var_dump($payment_info);
             Session::forget('payment_info');
             $payment_info=json_encode($payment_info);
             $request->session()->put('payment_info', $payment_info);
        return view('payment_method');
        }else{
        return view('view_cart');
        }


    }
    }