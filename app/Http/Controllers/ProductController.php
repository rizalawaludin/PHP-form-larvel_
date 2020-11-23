<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\freshproduct;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = freshproduct::all();
            
        return view('product.fresh',compact('product'));
    }
    public function store(Request $request)
    {
        freshproduct::create($request->all());

        return back();
    }
    public function edit($id)
    {
        $product = freshproduct::find($id);

        return view('product.tambahan.update',compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = freshproduct::find($id)->update($request->all());

        return redirect('produk/fresh');
    }
    public function destroy(Request $request)
    {
        $ids = $request->ids;
        DB::table("freshproducts")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}
