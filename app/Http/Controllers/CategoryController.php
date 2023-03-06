<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function cateIndex(){
        $students = Category::orderBy('id','DESC')->get();
        return view('category/index', compact('students'));
    }

    //Add Category 
    public function addCate(){
        return view('category/add_category');
    }
    public function addCateForm(Request $request){

        // dd($request);
        $request->validate([
            'category_name' => 'required'
        ],[
            'category_name.required' => 'Enter your category name'
        ]);
        Category::insert([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'create_date' => Carbon::now(),
            'status' => $request->status ? 1 : 0, 
        ]);
        return redirect('category')->with('success','Successfully Data Added');
        // return redirect()->action('CategoryController@cateIndex')->with('success','Successfully Data add');
    }

    //Edit and Update Category 
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('category/edit',compact('category'));
    }

    public function edited(Request $request, $id){

        $request->validate([
            'category_name' => 'required'
        ],[
            'category_name.required' => 'Enter your category name'
        ]);
        Category::findOrFail($id)->update([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'status' => $request->status ? 1 : 0, 
        ]);
        return redirect('category')->with('update','Successfully Data Upadeted');
    }

    //Category Delete 
    public function deleted($id){
        Category::findOrFail($id)->delete();
        return redirect('category')->with('delete','Successfully Data deleted');
    }
}
