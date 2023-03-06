<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subCateIndex(){
        $subcategory = SubCategory::orderBy('id','DESC')->get();
        return view('sub_category/index', compact('subcategory'));
    }
    public function addSubCate(){
        $categories = Category::all();
        return view('sub_category.add_sub_category', compact('categories'));
    }

    public function addSubCateform(Request $request){

        // dd($request);
        $request->validate([
            'sub_category_name' => 'required',
            'category_id' => 'required'
        ],[
            'sub_category_name.required' => 'Enter your category name',
            'category_id.required' => 'Fill up this field'
        ]);
        SubCategory::insert([
            'sub_category_name' => $request->sub_category_name,
            'categories_id' => $request->category_id,
            'sub_category_description' => $request->sub_category_description,
            'create_date' => Carbon::now(),
            'status' => $request->status ? 1 : 0, 
        ]);
        return redirect('subCategory')->with('success','Successfully Data Added');
        // return redirect()->action('CategoryController@cateIndex')->with('success','Successfully Data add');
    }

    public function subEdit($id){
        $categories = Category::all();
        $subCategory = SubCategory::findOrFail($id);
        return view('sub_category/edit',compact('subCategory','categories'));
    }

    public function subEdited(Request $request,$id){
        $request->validate([
            'sub_category_name' => 'required',
            'category_id' => 'required',
        ],[
            'sub_category_name.required' => 'Enter your category name',
            'category_id.required' => 'Fill up this field'
        ]);
        SubCategory::findOrFail($id)->update([
            'sub_category_name' => $request->sub_category_name,
            'categories_id' => $request->category_id,
            'sub_category_description' => $request->sub_category_description,
            'status' => $request->status ? 1 : 0, 
        ]);
        return redirect('subCategory')->with('update','Successfully Data Updated');
    }

    public function deleted($id){
        SubCategory::findOrFail($id)->delete();
        return redirect('subCategory')->with('delete','Successfully Data Deleted');
    }
        
}
