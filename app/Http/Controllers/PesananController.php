<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\t_fresh;
use App\t_retur;
use App\tfresh;
use App\tretur;
use App\gfresh;
use App\gretur;
use Carbon\Carbon;
use App\fresh_order;
use App\retur_order;
use App\Exports\TDFresh;
use App\Exports\TDRetur;
use App\Imports\SFreshImport;
use App\Imports\SReturImport;

class PesananController extends Controller
{
    public function fresh()
    {
    	$pesanan = fresh_order::all()->unique('fod_no');

    	return view('product.pesanan.fresh',compact('pesanan'));
    }
    public function retur()
    {
    	$pesanan = retur_order::all()->unique('fod_no');

    	return view('product.pesanan.retur',compact('pesanan'));
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        DB::table("fresh_orders")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);
    }
    public function deleteAll2(Request $request)
    {
        $ids = $request->ids;

        DB::table("retur_orders")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);
    }
    public function deleteAll3(Request $request)
    {
        $ids = $request->ids;

        DB::table("t_freshes")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);
    }
    public function deleteAll4(Request $request)
    {
        $ids = $request->ids;

        DB::table("t_returs")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);
    }
    public function deleteAll5(Request $request)
    {
        $ids = $request->ids;

        DB::table("greturs")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);
    }
    public function deleteAll6(Request $request)
    {
        $ids = $request->ids;

        DB::table("gfreshes")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);
    }
    public function pesanan_fresh()
    {
        $product = t_fresh::all();

        return view('admin.pesanan.tersedia.fresh',compact('product'));
    }
    public function pesanan_retur()
    {
        $product = t_retur::all();

        return view('admin.pesanan.tersedia.retur',compact('product'));
    }
    public function detail_fresh($fod_no)
    {
        $pesanan = fresh_order::all()->where('fod_no',$fod_no);

        return view('product.pesanan.detail.fresh',compact('pesanan'));
    }
    public function detail_retur($fod_no)
    {
        $pesanan = retur_order::all()->where('fod_no',$fod_no);

        return view('product.pesanan.detail.retur',compact('pesanan'));
    }
    public function fresh_order()
    {
        return Excel::download(new TDFresh, 'orderfresh.xlsx');
    }
    public function retur_order()
    {
        return Excel::download(new TDRetur, 'orderetur.xlsx');
    }
    public function edit_retur($id)
    {
        $product = t_retur::find($id);

        return view('admin.pesanan.tersedia.edit.retur',compact('product'));
    }
    public function update_retur(Request $request,$id)
    {
        $product = t_retur::find($id)->update($request->all());

        return redirect('/order/retur/tersedia');
    }
    public function edit_fresh($id)
    {
        $product = t_fresh::find($id);

        return view('admin.pesanan.tersedia.edit.fresh',compact('product'));
    }
    public function update_fresh(Request $request,$id)
    {
        $product = t_fresh::find($id)->update($request->all());

        return redirect('/order/fresh/tersedia');
    }
}
