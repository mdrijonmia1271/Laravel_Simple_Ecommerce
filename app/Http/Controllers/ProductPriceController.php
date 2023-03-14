<?php

namespace App\Http\Controllers;

use App\Models\ProductPrice;
use Illuminate\Http\Request;

class ProductPriceController extends Controller
{
    //

    public function create(Request $request){
        $request->validate([]);
        ProductPrice::insert([
            'product_price' => $request->product_price,
            'product_id' => $request->product_id,
        ]);
        return redirect('product/index')->with('success','Successfully Price Added');
    }

    public function update(Request $request, $id){
        ProductPrice::findOrFail($id)->update([
            'product_price' => $request->product_price,
            'product_id' => $request->product_id,
        ]);
        return redirect('product/index')->with('update','Successfully Data Updated');
    }
}
