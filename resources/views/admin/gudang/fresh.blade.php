@extends('layouts.app')
@section('title','Gudang Stok Fresh')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gudang Stok Fresh</div>

                <div class="card-body">
                    @if($product->count() > 0)
                    <button class="btn btn-primary delete_all" data-url="{{ url('order_delete6') }}">Hapus Pilihan</button><br><br>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="50px"><input type="checkbox" id="master"></th>
                                    <th>No</th>
                                    <th>No FOD</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <?php $no = 1 ?>
                            <tbody>
                                @if($product->count())
                                    @foreach($product as $item)
                                        <tr id="tr_{{$item->id}}">
                                            <td><input type="checkbox" class="sub_chk" data-id="{{$item->id}}"></td>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->fod_no}}</td>
                                            <td>{{$item->nm_barang}}</td>
                                            <td>{{$item->jumlah}}</td>
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