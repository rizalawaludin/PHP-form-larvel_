@extends('layouts.app')
@section('title','Detail Pesanan Retur')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Detail Pesanan Retur</div>
                <div class="card-body">
                    @foreach($pesanan as $order)
                        @if($pesanan->count() > 0)
                            <button class="btn btn-danger delete_all" data-url="{{ url('order_product2') }}">Hapus Semua</button>
                            <a href="/pesanan/retur/{{$order->fod_no}}/export" class="btn btn-success">Tarik Data</a>
                        @endif
                    @endforeach
                	<div class="panel-body">
                        <table class="table table-striped">
                        	<thead>
                            	<tr>
                                    <th width="50px"><input type="checkbox" id="master"></th>
                            		<th>No</th>
                            		<th>No FOD</th>
                                    <th>Nama Pemesan</th>
                                    <th>Cabang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Pesanan</th>
                            	</tr>
                            </thead>
                            <?php $no = 1 ?>
                            <tbody>
                                @if($pesanan->count())
                                	@foreach($pesanan as $order)
                                    	<tr id="tr_{{$order->id}}">
                                            <td><input type="checkbox" class="sub_chk" data-id="{{$order->id}}"></td>
                                            <td>{{$no++}}</td>
                                            <td>{{$order->fod_no}}</td>
                                            <td>{{$order->item}}</td>
                                            <td>{{$order->satuan}}</td>
                                            <td>{{$order->jml_pesanan}}</td>
                                            <td>{{$order->nm_pemesan}}</td>
                                    	</tr>
                                	@endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div>
                    	<a href="/pesanan/retur" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop