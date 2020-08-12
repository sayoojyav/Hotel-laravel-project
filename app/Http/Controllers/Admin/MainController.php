<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class MainController extends Controller
{
	public function index()
    {
    	if(\Auth::guard('admins')->user())
    	{
    		return redirect()->route('admin::dashboard');
    	} 
    	else 
    	{
    		return redirect()->route('admin::get_login');
    	}
    }
    public function main()
    {
        $category = Category::all();
        // dd($category);
        return view('Admin.dashboard.addcategory',['categorys'=>$category]);
        // return view('Admin.dashboard.addcategory');
    }
    public function store(Request $request)
    {
        $add=new Category;
        $add->categoryname=$request['categoryname'];
        $add->save();
        return redirect()->route('admin::addcategory');
    }
     public function mainindex()
    {
        $cate=Category::all();
        $subcate=Subcategory::all();

        return view('Admin.dashboard.subcategory',compact('cate','subcate'));
    }
    public function substore(Request $request)
    {
        // dd($request);
        $category=new Subcategory;
        $category->parent_id=$request['Category'];
        $category->subcategory_list=$request['subcategory_list'];
        $category->save();
        return redirect()->route('admin::subcategory');
    }
    
}
