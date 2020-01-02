<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\User;
use App\Logo;
use App\Image;
use App\Color;

class Admin extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin/admin_index');
    }

    public function user_data_table() {
        return view('admin/user_data_table', ['users' => $users]);
    }
    

    public function product_data_table() {
        $products=DB::table('products')
        ->join('product_type','type','=','idproduct_type')->select('*')->get();
        return view('admin/product_data_table', ['products' => $products]);
    }

    public function product_edit(Request $request, $id) {
        $idproduct = $id;
        if ($idproduct != 0) {
            $select1=DB::table('product_type')->groupBy('category_menu','category')->orderByRaw('idproduct_type')->get();
            $select2=DB::table('product_type')->get();
            $product = Product::where('idproduct',$idproduct)->get();
            $color=Color::all();
            return view('admin/product_update')->with('product', $product)->with('select2', $select2)->with('select1', $select1)->with('color', $color);
        } else {
            $select1=DB::table('product_type')->groupBy('category_menu','category')->orderByRaw('idproduct_type')->get();
            $select2=DB::table('product_type')->get();
            $product = NULL;
             $color=Color::all();
            return view('admin/product_update')->with('product', $product)->with('select2', $select2)->with('select1', $select1)->with('color', $color);
        }
    }
    public function product_update(Request $request, $id) {
        $idproduct = $id;
        $name = $_POST['name'];
        $description=$_POST['description'];
        $type=$_POST['select'];
        $quantity=$_POST['quantity'];
        $price=$_POST['price'];
        print_r($idproduct);
       /* $active = $_POST['select'];
        if($active==1){
            $new=0;
            Logo::where('in_use',$active)->update(['in_use' => $new,]);
        }*/
        $product_image = $request->file('image');

        if ($idproduct ==0) {
            Product::create(['name' => $name,'quantity' => $quantity,'description' => $description, 'price' => $price,'type' => $type ]);
            $id=DB::table('products')->orderBy('idproduct', 'desc')->first();
            $id=$id->idproduct;
            $extension = $product_image->getClientOriginalExtension();
            $product_name= 'site/images/product/id'.$id.'/img/'.$name .'.'.date('d-m-Y').'.'.$extension;
            $path_img='storage/'.$product_name;
            Storage::disk('public')->put($product_name,  File::get($product_image));
            Product::where('idproduct',$id)->update(['img_folder' => $path_img,]);
            session()->flash('notif','Successfuly add new Product tip je '.$type);
            return redirect()->route('products_table');
         
        } else {
            print_r($idproduct);
            $product = Product::where('idproduct',$idproduct)->get();
            foreach ($product as $product){
             $path_img=$product->img_folder;
            }
            $fileimg=public_path($path_img);
            if(File::exists($fileimg)){
                /*File::delete($fileimg);*/
            };
                if($product_image){
                $extension = $product_image->getClientOriginalExtension();
                $product_name= 'site/images/product/id'.$idproduct.'/img/'.$name .'.'.date('d-m-Y').'.'.$extension;
                $path_img='storage/'.$product_name;
                Storage::disk('public')->put($product_name,  File::get($product_image));
                Product::where('idproduct',$idproduct)->update(['name' => $name, 'img_folder' => $path_img,'quantity' => $quantity,'description' => $description, 'price' => $price,'type' => $type ]);
                session()->flash('notif','Successfuly change Product');
                 return redirect()->route('products_table');
             }else{
            Product::where('idproduct',$idproduct)->update(['name' => $name, 'quantity' => $quantity,'description' => $description, 'price' => $price,'type' => $type ]);
            session()->flash('notif','Successfuly change Product');
             return redirect()->route('products_table');
         }
        }

    }

    public function logo_display() {
        $data = Logo::all();
        return view('admin/manage_logo')->with('logo', $data);
        ;
    }

    public function logo_edit(Request $request, $id) {
        $idlogo = $id;
        if ($idlogo != 0) {
            
            $logo = Logo::where('id',$idlogo)->get();
            return view('admin/logo_edit')->with('logo', $logo);
            var_dump($logo);
        } else {
            $logo = NULL;
            return view('admin/logo_edit')->with('logo', $logo);
        }
    }

    public function logo_update(Request $request, $id) {
        $idlogo = $id;
        $title = $_POST['logo'];
        $active = $_POST['select'];
        if($active==1){
            $new=0;
            Logo::where('in_use',$active)->update(['in_use' => $new,]);
        }
        $logo_image = $request->file('logo-image');
        $favicon_image=$request->file('favicon-image');
        if ($idlogo ==0) {
         if($logo_image && $favicon_image){

            $extension = $logo_image->getClientOriginalExtension();
            $logo_name= 'site/images/logos/'.$title .'.'.date('d-m-Y').'.'.$extension;
            $favicon_name='site/images/favicon/'.$title .'.'.date('d-m-Y');
            Storage::disk('public')->put($logo_name,  File::get($logo_image));
            Storage::disk('public')->put($favicon_name,  File::get($favicon_image));
            $path_fav='storage/'.$favicon_name;
            $path_img='storage/'.$logo_name;
            Logo::create(['title' => $title, 'logo_image' => $path_img, 'favicon_image' => $path_fav, 'in_use' => $active]);
            session()->flash('notif','Successfuly add new logo');
            return redirect()->route('logo_display');
         }else{
            Logo::create(['title' => $title, 'in_use' => $active]);
            session()->flash('notif','Successfuly add new logo');
            return redirect()->route('logo_display');
         }
        } else {
            $logo = Logo::where('id',$idlogo)->get();
            foreach ($logo as $logo){
             $path_fav=$logo->favicon_image;
             $path_img=$logo->logo_image;
            }
            $filefav=public_path($path_fav);
            $fileimg=public_path($path_img);
            if(File::exists($filefav) && File::exists($fileimg)){
                /*File::delete($filefav)
                File::delete($fileimg)*/
            };
                if($logo_image && $favicon_image){
                $extension = $logo_image->getClientOriginalExtension();
                $logo_name= 'site/images/logos/'.$title .'.'.date('d-m-Y').'.'.$extension;
                $favicon_name='site/images/favicon/'.$title .'.'.date('d-m-Y');
                $path_favv='storage/'.$favicon_name;
                $path_imgg='storage/'.$logo_name;
                Storage::disk('public')->put($logo_name,  File::get($logo_image));
                Storage::disk('public')->put($favicon_name,  File::get($favicon_image));
                Logo::where('id',$idlogo)->update(['title' => $title, 'logo_image' => $path_imgg, 'favicon_image' => $path_favv, 'in_use' => $active]);
                session()->flash('notif','Successfuly change logo');
                 return redirect()->route('logo_display');
             }else{
            Logo::where('id',$idlogo)->update(['title' => $title, 'in_use' => $active]);
            session()->flash('notif','Successfuly change logo');
            return redirect()->route('logo_display');
         }
        }
    }
    public function logo_delete($id){
        $idlogo=$id;
        Logo::where('id',$idlogo)->delete();
        session()->flash('notif','Successfuly delete logo');
        return redirect()->route('logo_display');
    }

    public function img_display($type){
        $type=$type;
         $data = Image::where('type',$type)->get();
        return view('admin/corusel')->with('image', $data)->with('type',$type);
        
   }
   public function img_edit(Request $request, $type, $id) {
            $idimage=$id;
        if ($idimage != 0) {
            
            $image = Image::where('id',$idimage)->get();
            return view('admin/img_edit')->with('image',  $image)->with('type',$type);
            
        } else {
             $image = NULL;
            return view('admin/img_edit')->with('image',  $image)->with('type',$type);
        }
    }
    public function img_update(Request $request, $type, $id){
        $idimg = $id;
        $text = $_POST['text'];
        $active = $_POST['select'];
        $image = $request->file('image');
        $type=$type;

        if ($idimg ==0) {
         if($image){

            $extension = $image->getClientOriginalExtension();
            $img_name= 'site/images/'.$type.'/'.$text .'.'.date('d-m-Y').'.'.$extension;
            Storage::disk('public')->put($img_name,  File::get($image));
            $path_img='storage/'.$img_name;
            Image::create(['text' => $text, 'img_site' => $path_img,  'in_use' => $active, 'type' => $type]);
            session()->flash('notif','Successfuly add new'.$type);
            return redirect()->route('img_display',$type);
         }else{
            Image::create(['text' => $text, 'in_use' => $active]);
            session()->flash('notif','Successfuly add new'.$type);
            return redirect()->route('img_display', $type);
         }
        } else {
            $oldImage = Image::where('id',$idimg)->get();
            foreach ($oldImage as $oldImage){
             $path_img=$oldImage->img_site;
            }
            $fileimg=public_path($path_img);
            if( File::exists($fileimg)){
                // File::delete($fileimg)
            };
                if($image){
                $extension = $image->getClientOriginalExtension();
                $img_name= 'site/images/'.$type.'/'.$text .'.'.date('d-m-Y').'.'.$extension;
                $path_imgg='storage/'.$img_name;
                Storage::disk('public')->put($img_name,  File::get($image));
                Image::where('id',$idimg)->update(['text' => $text, 'img_site' => $path_imgg,  'in_use' => $active, 'type' => $type]);
                session()->flash('notif','Successfuly change'.$type);
                 return redirect()->route('img_display',$type);
             }else{
            Image::where('id',$idimg)->update(['text' => $text, 'in_use' => $active]);
            session()->flash('notif','Successfuly change'.$type);
            return redirect()->route('img_display',$type);
         }
        }
    }
    
    public function img_delete($type,$id){
        $idimg=$id;
        Logo::where('id',$idimg)->delete();
        session()->flash('notif','Successfuly delete Imgage');
        return redirect()->route('img_display',$type);
        
   }


}
