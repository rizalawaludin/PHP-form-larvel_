<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\g_retur;
use App\Exports\Gudang_Retur;
USE App\Imports\ReturnImport;

class ReturnController extends Controller
{
	public function index()
	{
		$product = g_retur::all();

		return view('admin.return.retur',compact('product'));
	}
	public function deleteAll(Request $request)
	{
		$ids = $request->ids;

        DB::table("g_returs")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);
	}
    public function iretur()
    {
    	return Excel::download(new Gudang_Retur, 'return_retur.xlsx');
    }
    public function send_retur(Request $request)
    {
    	$this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new ReturnImport, $file); //IMPORT FILE 
            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
}
