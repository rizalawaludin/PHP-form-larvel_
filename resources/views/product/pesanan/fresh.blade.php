@extends('layouts.app')
@section('title','Terima Pesanan Fresh')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Terima Pesanan Fresh</div>
                <div class="card-body">
                	<div class="panel-body">
                        @if($pesanan->count() > '0')
                        <table class="table table-striped">
                        	<thead>
                            	<tr>
                            		<th>No</th>
                                    <th>No Pengiriman</th>
                            	</tr>
                            </thead>
                            <?php $no = 1 ?>
                            <tbody>
                                @if($pesanan->count())
                                	@foreach($pesanan as $order)
                                    	<tr>
                                            <td>{{$no++}}</td>
                                            <td><a href="/pesanan/fresh/{{$order->fod_no}}">{{$order->fod_no}}</a></td>
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