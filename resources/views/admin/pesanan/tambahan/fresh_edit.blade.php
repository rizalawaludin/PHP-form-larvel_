@extends('layouts.app')
@section('title','Edit Jumlah Pesanan Fresh')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Update Barang Fresh</div>
                <div class="card-body">
                    <form method="post" action="/fresh/{{$product->id}}">
                    	{{csrf_field()}}
                        <div class="form-group">
                            <label>Jumlah Pesanan</label>
                            <input type="text" class="form-control" name="jumlah" required value="{{$product->jumlah}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/order/fresh/" class="btn btn-default">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop