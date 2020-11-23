<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\FreshImport;
use App\Imports\ReturImport;
use App\Exports\FreshExport;
use App\Exports\ReturExport;
use App\Imports\PFresh;
use App\Imports\PRetur;

class ImportController extends Controller
{
    public function fresh(Request $request)
    {
    	$this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new FreshImport, $file); //IMPORT FILE 
            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
    public function retur(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new ReturImport, $file); //IMPORT FILE 
            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
    public function ifresh()
    {
        return Excel::download(new FreshExport, 'barangfresh.xlsx');
    }
    public function iretur()
    {
        return Excel::download(new ReturExport, 'barangretur.xlsx');
    }
}
