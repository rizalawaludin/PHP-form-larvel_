@extends('layouts.app')
@section('title','List Pesanan Retur')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">List Pesanan Retur</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($product->count() > 0)
                    <button class="btn btn-primary delete_all" data-url="{{ url('order_delete2') }}">Pesanan Tersedia</button>
                    <a href="/order/retur/export" class="btn btn-success">Tarik Data</a><br><br>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="50px"><input type="checkbox" id="master"></th>
                                        <th>No</th>
                                        <th>No Invoice</th>
                                        <th>Nama Pegawai & Telp.</th>
                                        <th>Cabang & Dept.</th>
                                        <th>Kode Produk & Jumlah</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Opsi</th>
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
                                                <td>{{$item->product}}<br> ({{$item->jumlah}})</td>
                                                <td>{{$item->created_at}}</td>
                                                <td><a href="/retur/{{$item->id}}/edit">Edit</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    <div style="float: right;">
                        <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Kirim Pesanan</button>
                    </div>
                    @else
                    <p>Belum ada data yang masuk</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5>Kirim Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <div class="modal-body">
                        <form action="{{ url('/ksjalan/retur') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-success">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">File (.xlsx)</label>
                                <input type="file" class="form-control" name="file">
                                <p class="text-danger">{{ $errors->first('file') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Upload</button>
                            </div>
                        </form>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@stop