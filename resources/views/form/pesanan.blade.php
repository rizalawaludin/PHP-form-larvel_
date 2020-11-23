@extends('layouts.web')
@section('title','Pesanan Tersedia')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pesanan Tersedia</div>
                <div class="card-body">
                	<h4>Produk Fresh</h4>
                	<div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            	<tr>
                            		<th>Nama Pegawai</th>
                            		<th>Cabang</th>
                                    <th>Pesanan</th>
                                    <th>Jumlah</th>
                            	</tr>
                            </thead>
                            @foreach($fresh as $baru)
                            <tbody>
                            	<tr>
                            		<td>{{$lama->nm_pegawai}}</td>
                                    <td>{{$lama->cabang}}</td>
                                    <td>{{$lama->produk}}</td>
                                    <td>{{$lama->jumlah}}</td>
                            	</tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <h4>Produk Retur</h4>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Pegawai</th>
                                    <th>Cabang</th>
                                    <th>Pesanan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            @foreach($retur as $lama)
                            <tbody>
                                <tr>
                                    <td>{{$lama->nm_pegawai}}</td>
                                    <td>{{$lama->cabang}}</td>
                                    <td>{{$lama->produk}}</td>
                                    <td>{{$lama->jumlah}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div>
                    <a href="/" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop