<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gfresh;
use App\gretur;

class GudangController extends Controller
{
    function fresh()
    {
    	$product = gfresh::all();

        if(auth()->user()->role == 'jakarta'){
            $product = $product->where('cabang','jakarta')->sortByDesc('created_at');
        }elseif(auth()->user()->role == 'ciawi'){
            $product = $product->where('cabang','ciawi')->sortByDesc('created_at');
        }elseif(auth()->user()->role == 'cibitung'){
            $product = $product->where('cabang','cibitung')->sortByDesc('created_at');
        }elseif(auth()->user()->role == 'sentul'){
            $product = $product->where('cabang','sentul')->sortByDesc('created_at');
        }

    	return view('admin.gudang.fresh',compact('product'));
    }
    function retur()
    {
    	$product = gretur::all();

        if(auth()->user()->role == 'jakarta'){
            $product = $product->where('cabang','jakarta')->sortByDesc('created_at');
        }elseif(auth()->user()->role == 'ciawi'){
            $product = $product->where('cabang','ciawi')->sortByDesc('created_at');
        }elseif(auth()->user()->role == 'cibitung'){
            $product = $product->where('cabang','cibitung')->sortByDesc('created_at');
        }elseif(auth()->user()->role == 'sentul'){
            $product = $product->where('cabang','sentul')->sortByDesc('created_at');
        }

    	return view('admin.gudang.retur',compact('product'));
    }
}

