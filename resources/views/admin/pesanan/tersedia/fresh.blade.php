@extends('layouts.app')
@section('title','List Pesanan Tersedia Fresh')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">List Pesanan Tersedia Fresh</div>

                <div class="card-body">
                	@if($product->count() > '0')
                    <button class="btn btn-primary delete_all" data-url="{{ url('order_delete3') }}">Barang Laku</button><br><br>
                	<div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="50px"><input type="checkbox" id="master"></th>
                                    <th>No</th>
                                    <th>No Invoice</th>
                                    <th>Nama Pegawai & No Telp.</th>
                                    <th>Cabang & Departemen</th>
                                    <th>Kode Produk & Jumlah</th>
                                </tr>
                            </thead>
                            <?php $no = 1 ?>
                            <tbody>
                                @if($product->count())
                                    @foreach($product as $item)
                                        <tr id="tr_{{$item->id}}">
                                            <td><input type="checkbox" class="sub_chk" data-id="{{$item->id}}"></td>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->invoice_no}}</td>
                                            <td>{{$item->nm_pegawai}}<br>({{$item->nohp}})</td>
                                            <td>{{$item->cabang}}<br>({{$item->departemen}})</td>
                                            <td>{{$item->produk}}<br>({{$item->jumlah}})</td>
                                            <td><a href="/order/fresh/{{$item->id}}/edit">Edit</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>Belum ada data yang masuk</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop