@extends('layouts.app')
@section('title','History Pesanan Fresh')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">History Pesanan Fresh</div>

                <div class="card-body">
                    <div class="panel-body">
                        @if($product->count() > '0')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Invoice</th>
                                    <th>Nama Pegawai</th>
                                    <th>No Telp</th>
                                    <th>Cabang</th>
                                    <th>Departemen</th>
                                    <th>Produk & Jumlah</th>
                                    <th>Tanggal Pesan</th>
                                </tr>
                            </thead>
                            <?php $no = 1 ?>
                            <tbody>
                                @if($product->count())
                                    @foreach($product as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->invoice_no}}</td>
                                            <td>{{$item->nm_pegawai}}</td>
                                            <td>{{$item->nohp}}</td>
                                            <td>{{$item->cabang}}</td>
                                            <td>{{$item->departemen}}</td>
                                            <td>{{$item->produk}} ({{$item->jumlah}})</td>
                                            <td>{{$item->created_at}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        @else
                        <p>Belum ada data yang masuk</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop