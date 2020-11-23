@extends('layouts.web')
@section('title','Form Pemesanan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a href="/fresh" class="btn" style="margin-left: -150px;font-size: 15px">Pemesanan Produk Fresh NutriFood</a>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Pemesanan Produk NutriFood 
                    <a href="/pesanan/tersedia" style="float: right;" >Produk Sudah Tersedia</a></div>
                <div class="card-body">
                    <h5>List Produk Retur NutriFood</h5>
                    <div class="panel-body">
                    	@if($product->count() > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $item)
                                    <tr>
                                        @if($item->stok > '0')
                                        <td>{{$item->nm_produk}}</td>
                                        <td>{{$item->stok}}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>Tidak Ada Produk Retur Untuk Saat Ini</p>
                        @endif
                        <div class="paging">
                            {{$product->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="/retur" class="btn" style="margin-right: -175px;font-size: 15px;">Pemesanan Produk Retur NutriFood</a>
    </div>
</div>
@stop