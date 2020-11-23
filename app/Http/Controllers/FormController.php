<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\freshproduct;
use App\returproduct;
use App\fresh_form;
use App\retur_form;
use App\t_fresh;
use App\t_retur;
use Carbon\Carbon;
use Validator;
use DB;

class FormController extends Controller
{
    public function index()
    {
        $product = returproduct::orderBy('nm_produk')->paginate(8);

        return view('index',compact('product'));
    }
    public function fresh()
    {
        $product = freshproduct::all();

        return view('form.fresh',compact('product'));
    }
    public function retur()
    {
        $product = returproduct::all();

        return view('form.retur',compact('product'));
    }
    public function add_fresh(Request $request)
    {   
    	if($request->ajax())
        {
          $rules = array(
           'nm_pegawai.*'  => 'required',
           'nohp.*'  => 'required',
           'cabang.*'  => 'required',
           'departemen.*'  => 'required',
           'product.*'  => 'required',
           'jumlah.*'  => 'required',
          );

          $error = Validator::make($request->all(), $rules);
          if($error->fails())
          {
           return response()->json([
                'error' => $error->errors()->all()
            ]);
          }
          $kode = $this->kode_fresh();
          $nm_pegawai = $request->nm_pegawai;
          $nohp = $request->nohp;
          $cabang = $request->cabang;
          $departemen = $request->departemen;
          $product = $request->product;
          $jumlah = $request->jumlah;
          $tanggal = date('y-m-d');
          
          for($count = 0; $count < count($nm_pegawai); $count++)
          {
           $data = array(
            'invoice_no'  => $kode,
            'nm_pegawai' => $nm_pegawai[$count],
            'nohp'  => $nohp[$count],
            'cabang' => $cabang[$count],
            'departemen'  => $departemen[$count],
            'product' => $product[$count],
            'jumlah'  => $jumlah[$count],
            'created_at' => $tanggal,
           );
           $insert_data[] = $data; 
          }

          fresh_form::insert($insert_data);
          return response()->json([
            'success'   => 'No pesanan anda '.$kode.',<a href="/alert">klik untuk melanjutkan</a>'
          ]);
        }
    }
    public function add_retur(Request $request)
    {
        if($request->ajax())
        {
          $rules = array(
           'nm_pegawai.*'  => 'required',
           'nohp.*'  => 'required',
           'cabang.*'  => 'required',
           'departemen.*'  => 'required',
           'product.*'  => 'required',
           'jumlah.*'  => 'required',
          );

          $error = Validator::make($request->all(), $rules);
          if($error->fails())
          {
           return response()->json([
                'error' => $error->errors()->all()
            ]);
          }
          $kode = $this->kode_retur();
          $nm_pegawai = $request->nm_pegawai;
          $nohp = $request->nohp;
          $cabang = $request->cabang;
          $departemen = $request->departemen;
          $product = $request->product;
          $jumlah = $request->jumlah;
          $tanggal = date('y-m-d H:i:s');
          
          for($count = 0; $count < count($nm_pegawai); $count++)
          {
           $data = array(
            'invoice_no'  => $kode,
            'nm_pegawai' => $nm_pegawai[$count],
            'nohp'  => $nohp[$count],
            'cabang' => $cabang[$count],
            'departemen'  => $departemen[$count],
            'product' => $product[$count],
            'jumlah'  => $jumlah[$count],
            'created_at' => $tanggal,
           );
           $insert_data[] = $data;
          }

          retur_form::insert($insert_data);
          return response()->json([
            'success'   => 'No pesanan anda '.$kode.',<a href="/alert">klik untuk melanjutkan</a>'
          ]);
        }
    }
    public function alert()
    {
    	return view('form.alert');
    }
    public function kode_fresh()
    {
        $kd="";
        $query = DB::table('fresh_forms')->select(DB::raw('MAX(RIGHT(invoice_no,4)) as kd_max'))->whereDate('created_at',Carbon::today());
        if ($query->count()>0) {
          foreach ($query->get() as $key ) {
          $tmp = ((int)$key->kd_max)+1;
          $kd = sprintf("%04s", $tmp);
          }
        }else {
          $kd = "0001";
        }
        return  "PSF-".date('dmy').$kd;
    }
    public function fod_no_f()
    {
        $kd="";
        $query = DB::table('fresh_histories')->select(DB::raw('MAX(RIGHT(fod_no,4)) as kd_max'))->whereDate('created_at',Carbon::today());
        if ($query->count()>100) {
          foreach ($query->get() as $key ) {
          $tmp = ((int)$key->kd_max)+1;
          $kd = sprintf("%04s", $tmp);
          }
        }else {
          $kd = "0001";
        }
        return  "F-".$kd;
    }
    public function kode_retur()
    {
        $kd="";
        $query = DB::table('retur_forms')->select(DB::raw('MAX(RIGHT(invoice_no,4)) as kd_max'))->whereDate('created_at',Carbon::today());
        if ($query->count()>0) {
          foreach ($query->get() as $key ) {
          $tmp = ((int)$key->kd_max)+1;
          $kd = sprintf("%04s", $tmp);
          }
        }else {
          $kd = "0001";
        }
        return  "PSR-".date('dmy').$kd;
    }
    public function fod_no()
    {
        $kd="";
        $query = DB::table('retur_forms')->select(DB::raw('MAX(RIGHT(fod_no,4)) as kd_max'))->whereDate('created_at',Carbon::today());
        if (date('d') % 7 == 0) {
          foreach ($query->get() as $key ) {
          $tmp = ((int)$key->kd_max)+1;
          $kd = sprintf("%04s", $tmp);
          }
        }else {
          $kd = "0001";
        }
        return  "R-".$kd;
    }
    public function ptersedia()
    {
      $fresh = t_fresh::all();
      $retur = t_retur::all();

      return view('form.pesanan',compact('fresh','retur'));
    }
} 