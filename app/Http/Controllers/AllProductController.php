<?php

namespace App\Http\Controllers;

use App\Models\AllProduct;
use App\Models\Category;
use App\Models\Color;
use App\Models\Packet;
use App\Models\Size;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AllProductController extends Controller
{
    
    public function index(){
        $allProducts = AllProduct::orderBy('id','DESC')->get();
        return view('all_site_product/index', compact('allProducts'));
    }

    public function create(){
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $colories = Color::all();
        $sizes = Size::all();
        $packets = Packet::all();
        return view('all_site_product/add_product',compact('categories','subCategories','colories','sizes','packets'));
    }

    public function store(Request $request){
        $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'packet_id' => 'required',
            'quantity' => 'required',
        ],[
            'product_name.required' => 'Enter your product name',
            'category_id.required' => 'Select category name ',
            'sub_category_id.required' => 'Select sub category name',
            'color_id.required' => 'Select color name',
            'size_id.required' => 'Select size name',
            'packet_id.required' => 'Select packet name',
            'quantity.required' => 'Enter quantity name',
        ]);
        AllProduct::insert([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
            'packet_id' => $request->packet_id,
            'quantity' => $request->quantity,
            'product_description' => $request->product_description,
            'create_date' => Carbon::now(),
            'status' => $request->status ? 1 : 0, 
        ]);
        return redirect('product/index')->with('success','Successfully Data Added');
    }

    public function edit($id){
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $colories = Color::all();
        $sizes = Size::all();
        $packets = Packet::all();
        $allProducts = AllProduct::findOrFail($id);
        return view('all_site_product/edit',compact('allProducts','categories','subCategories','colories','sizes','packets'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'packet_id' => 'required',
            'quantity' => 'required',
        ],[
            'product_name.required' => 'Enter your product name',
            'category_id.required' => 'Select category name ',
            'sub_category_id.required' => 'Select sub category name',
            'color_id.required' => 'Select color name',
            'size_id.required' => 'Select size name',
            'packet_id.required' => 'Select packet name',
            'quantity.required' => 'Enter quantity name',
        ]);
        AllProduct::findOrFail($id)->update([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
            'packet_id' => $request->packet_id,
            'quantity' => $request->quantity,
            'product_description' => $request->product_description,
            'status' => $request->status ? 1 : 0, 
        ]);
        return redirect('product/index')->with('update','Successfully Data Updated');
    }

    public function detele($id){
        AllProduct::findOrFail($id)->delete();
        return redirect('product/index')->with('delete','Successfully Data Deleted');
    }
}
