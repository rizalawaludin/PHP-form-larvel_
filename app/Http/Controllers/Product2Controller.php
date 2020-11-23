<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\returproduct;
use App\return_retur;
use DB;

class Product2Controller extends Controller
{
    public function index()
    {
        $product = returproduct::all();
            
        return view('product.retur',compact('product'));
    }
    public function store(Request $request)
    {
        returproduct::create($request->all());

        return back();
    }
    public function edit($id)
    {
        $product = returproduct::find($id);

        return view('product.tambahan.update2',compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = returproduct::find($id)->update($request->all());

        return redirect('produk/retur');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("returproducts")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}
