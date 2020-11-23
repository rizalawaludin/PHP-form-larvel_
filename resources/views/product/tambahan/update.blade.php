@extends('layouts.app')
@section('title','Update Data Barang')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Update Barang Fresh</div>
                <div class="card-body">
                    <form method="post" action="/produk/{{$product->id}}/fresh">
                        @csrf
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" name="nm_produk" required value="{{$product->nm_produk}}">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" name="harga" required value="{{$product->harga}}">
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" class="form-control" name="satuan" required value="{{$product->satuan}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/produk/fresh/" class="btn btn-default">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
