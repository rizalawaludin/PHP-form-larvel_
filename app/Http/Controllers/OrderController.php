<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use Validator;
use Carbon\Carbon;
use App\fresh_form;
use App\retur_form;
use App\fresh_order;
use App\retur_order;
use App\sjalan_fresh;
use App\sjalan_retur;
use App\Exports\KPFresh;
use App\Exports\KPRetur;
use App\Imports\KFreshImport;
use App\Imports\KReturImport;

class OrderController extends Controller
{
    public function fresh()
    {
        $product =  fresh_form::all();

        if(auth()->user()->role == 'jakarta'){
            $product = $product->where('cabang','jakarta')->sortByDesc('created_at');
        }elseif(auth()->user()->role == 'ciawi'){
            $product = $product->where('cabang','ciawi')->sortByDesc('created_at');
        }elseif(auth()->user()->role == 'cibitung'){
            $product = $product->where('cabang','cibitung')->sortByDesc('created_at');
        }elseif(auth()->user()->role == 'sentul'){
            $product = $product->where('cabang','sentul')->sortByDesc('created_at');
        }

    	return view('admin.pesanan.fresh',compact('product'));
    }
    public function retur()
    {
        $product =  retur_form::all();

        if(auth()->user()->role == 'jakarta'){
            $product = $product->where('cabang','jakarta')->sortByDesc('created_at');
        }elseif(auth()->user()->role == 'ciawi'){
            $product = $product->where('cabang','ciawi')->sortByDesc('created_at');
        }elseif(auth()->user()->role == 'cibitung'){
            $product = $product->where('cabang','cibitung')->sortByDesc('created_at');
        }elseif(auth()->user()->role == 'sentul'){
            $product = $product->where('cabang','sentul')->sortByDesc('created_at');
        }

    	return view('admin.pesanan.retur',compact('product'));
    }
    public function ifresh()
    {
        return Excel::download(new KPFresh, 'pesananfresh.xlsx');
    }
    public function iretur()
    {
        return Excel::download(new KPRetur, 'pesananretur.xlsx');
    }
    public function edit_fresh($id)
    {
        $product = fresh_form::find($id);
        return view('admin.pesanan.tambahan.fresh_edit',compact('product'));
    }
    public function edit_retur($id)
    {
        $product = retur_form::find($id);
        return view('admin.pesanan.tambahan.retur_edit',compact('product'));
    }
    public function update_fresh(Request $request,$id)
    {
        $product = fresh_form::find($id)->update($request->all());

        return redirect('/order/fresh');
    }
    public function update_retur(Request $request,$id)
    {
        $product = retur_form::find($id)->update($request->all());

        return redirect('/order/retur');
    }
    public function sendorder_fresh(Request $request)
    {
    	$this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new KFreshImport, $file); //IMPORT FILE 
            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
    public function sendorder_retur(Request $request)
    {
    	$this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new KReturImport, $file); //IMPORT FILE 
            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        DB::table("fresh_forms")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);
    }
    public function deleteAll2(Request $request)
    {
        $ids = $request->ids;

        DB::table("retur_forms")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}
