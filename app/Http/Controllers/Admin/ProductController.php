<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
    	$cate=Category::all();
        // dd($cate);
        return view('Admin.dashboard.product',['cates'=>$cate]);
    }
    public function mainindex()
    {

        return view('Admin.dashboard.product',);
    }
    //Ajax operation for subcategory_list
    public function onclick(Request $request)
    {
        $Category_id=$request->id;
        $sub_cat=Subcategory::where('parent_id','=',$Category_id)->get();
        echo json_encode($sub_cat);
    }
    public function store(Request $request)
    {
        

        if($request->hasFile('filenames'))
        {
           
            $path = $request->file('filenames')->store('products','public');
        }
        ////////////////////////////////////////////////////////////////////////////
        // dd($request->file('filenames'));
        // if($request->hasFile('filenames'))
        // foreach ($request('filenames') as $key => $multifile) 
        //     {
               
        //         $path = $multifile->file('filenames')->store('products','public');
        //         $muti_img[$key]=$path;
        //     }

        //    dd($muti_img); 
        // }
        ////////////////////////////////////////////////////////////
        // $filenames=array();
        // if($files =$request->file('filenames'))
        // {
        //     foreach ($files as $file)
        //     {
        //         $name=$file->getClientOriginalName();
        //         dd($name);
        //         $file->move('image',$name);
        //         $filenames[]=$name;
               
        //     }
        // }

        $data= new Product;
        $data->productname=$request['productname'];
        $data->product_quantity=$request['product_quantity'];
        $data->price=$request['price'];
        $data->category=$request['Category'];
        $data->subcategory=$request['subcategory'];
        $data->image=$path;
        $data->description=$request['description'];
        $data->save();
        return redirect()->route('admin::show_product');
    }
    public function view()
    {
        $show = Product::all();
        return view('Admin.dashboard.viewproduct',['product' =>$show]);
    }
}

