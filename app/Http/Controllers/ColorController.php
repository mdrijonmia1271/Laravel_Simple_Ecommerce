<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function colorIndex(){
        $colories = Color::orderBy('id','DESC')->get();
        return view('colors/index', compact('colories'));
    }
    public function addColored(){
        $subCategories = SubCategory::all();
        return view('colors/add_color',compact('subCategories'));
    }
    public function addColoredForm(Request $request){
        $request->validate([
            'color_name' => 'required',
            'sub_category_id' => 'required'
        ],[
            'color_name.required' => 'Enter your color name',
            'sub_category_id.required' => 'Fill up this field'
        ]);
        Color::insert([
            'color_name' => $request->color_name,
            'sub_category_id' => $request->sub_category_id,
            'color_description' => $request->color_description,
            'create_date' => Carbon::now(),
            'status' => $request->status ? 1 : 0, 
        ]);
        return redirect('colorIndex')->with('success','Successfully Data Added');
    }
    public function colorEdit($id){
        $subCategories = SubCategory::all();
        $colories = Color::findOrFail($id);
        return view('colors/edit',compact('colories','subCategories'));
    }

    public function colorEdited(Request $request ,$id){
        $request->validate([
            'color_name' => 'required',
            'sub_category_id' => 'required'
        ],[
            'color_name.required' => 'Enter your color name',
            'sub_category_id.required' => 'Fill up this field'
        ]);
        Color::findOrFail($id)->update([
            'color_name' => $request->color_name,
            'sub_category_id' => $request->sub_category_id,
            'color_description' => $request->color_description,
            'status' => $request->status ? 1 : 0, 
        ]);
        return redirect('colorIndex')->with('update','Successfully Data Updated');
    }

    public function deleted($id){
        Color::findOrFail($id)->delete();
        return redirect('colorIndex')->with('delete','Successfully Data Deleted');
    }
}
