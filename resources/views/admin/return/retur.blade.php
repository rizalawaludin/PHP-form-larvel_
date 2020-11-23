@extends('layouts.app')
@section('title','Pengembalian Produk Retur')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Penerimaan Pengembalian Produk Retur</div>

                <div class="card-body">
                    @if($product->count() > 0)
                    <button class="btn btn-primary delete_all" data-url="{{ url('return_delete') }}">Hapus Pilihan</button><br><br>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="50px"><input type="checkbox" id="master"></th>
                                        <th>No</th>
                                        <th>Fod No</th>
                                        <th>Cabang</th>
                                        <th>Produk</th>
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
                                                <td>{{$item->cabang}}</td>
                                                <td>{{$item->produk}}</td>
                                                <td>({{$item->jumlah}})</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    @else
                    <p>Tidak Ada Barang Untuk Saat Ini</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection