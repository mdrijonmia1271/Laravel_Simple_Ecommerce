<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SubCategoryControllerCopy extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = SubCategory::orderBy('id','DESC')->get();
        return view('sub_category/index', compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('sub_category.add_sub_category', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $subCategory = SubCategory::findOrFail($id);
        return view('sub_category/edit',compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::findOrFail($id)->delete();
        return redirect('subCategory')->with('delete','Successfully Data Deleted');
    }
}
