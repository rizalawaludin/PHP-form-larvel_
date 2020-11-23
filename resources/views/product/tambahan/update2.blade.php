@extends('layouts.app')
@section('title','Update Data Barang')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Update Barang retur</div>
                <div class="card-body">
                    <form method="post" action="/produk/{{$product->id}}/retur">
                    	{{csrf_field()}}
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" name="nm_produk" required value="{{$product->nm_produk}}">
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" class="form-control" name="stok" required value="{{$product->stok}}">
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" class="form-control" name="satuan" required value="{{$product->satuan}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/produk/retur/" class="btn btn-default">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
