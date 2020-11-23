<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fresh_history;
use App\retur_history;

class HistoryController extends Controller
{
    public function fresh()
    {
    	$product = fresh_history::all()->sortByDesc('created_at');

    	return view('admin.history.fresh',compact('product'));
    }
    public function retur()
    {
    	$product = retur_history::all()->sortByDesc('created_at');

    	return view('admin.history.retur',compact('product'));
    }
}
