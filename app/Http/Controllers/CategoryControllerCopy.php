<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoryControllerCopy extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Category::orderBy('id','DESC')->get();
        return view('category.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add_category');
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
        $category = Category::findOrFail($id);
        return view('category/edit',compact('category'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect('category')->with('delete','Successfully Data deleted');
    
    }
}
