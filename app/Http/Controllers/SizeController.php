<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function sizeIndex(){
        $sizes = Size::orderBy('id','DESC')->get();
        return  view('sizes/index', compact('sizes'));
    }

    public function addSizes(){
        $colories = Color::all();
        return view('sizes/add_size', compact('colories'));
    }

    public function addSizeFormed(Request $request){
        $request->validate([
            'size_name' => 'required',
            'color_id' => 'required',
        ],[
            'size_name.required' => 'Enter your size name',
            'color_id.required' => 'Fill up this field',
        ]);
        Size::insert([
            'size_name' =>$request->size_name,
            'color_id' => $request->color_id,
            'size_description' => $request->size_description,
            'create_date' => Carbon::now(),
            'status' => $request->status ? 1 : 0, 
        ]);
        return redirect('sizeIndex')->with('success','Successfully Data Added');
    }

    public function sizeEdit($id){
        $colories = Color::all();
        $sizes = Size::findOrFail($id);
        return view('sizes/edit', compact('sizes','colories'));

    }

    public function sizeEdited(Request $request, $id){
        $request->validate([
            'size_name' => 'required',
            'color_id' => 'required'
        ],[
            'size_name.required' => 'Enter your color name',
            'color_id.required' => 'Fill up this field'
        ]);
        Size::findOrFail($id)->update([
            'size_name' => $request->size_name,
            'color_id' => $request->color_id,
            'size_description' => $request->size_description,
            'status' => $request->status ? 1 : 0, 
        ]);
        return redirect('sizeIndex')->with('update','Successfully Data Updated');
    }
    public function delete($id){
        Size::findOrFail($id)->delete();
        return redirect('sizeIndex')->with('delete','Successfully Data Deleted');
    }
}
