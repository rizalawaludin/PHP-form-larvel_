@extends('layouts.app')
@section('title','Daftar Barang Fresh')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Daftar Barang Fresh</div>

                <div class="card-body">
                    @if($product->count() > '0')
                        @if(auth()->user()->role == 'pegawai')
                        <button class="btn btn-danger delete_all" data-url="{{ url('produk_fresh') }}">Hapus Semua</button>
                        @endif
                	<a href="/produk/fresh/export" class="btn btn-success">Export Excel</a>
                	<a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</a><br><br>
                	<div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            	<tr>
                                    @if(auth()->user()->role == 'pegawai')
                                    <th width="50px"><input type="checkbox" id="master"></th>
                                    @endif
                            		<th>No</th>
                            		<th>Kode Produk</th>
                            		<th>Nama Produk</th>
                            		<th>Harga</th>
                            		<th>Satuan</th>
                            		<th colspan="2">Opsi</th>
                            	</tr>
                            </thead>
                            <?php $no = 1 ?>
                            <tbody>
                                @if($product->count())
    	                            @foreach($product as $item)
    	                            	<tr id="tr_{{$item->id}}">
                                            @if(auth()->user()->role == 'pegawai')
                                            <td><input type="checkbox" class="sub_chk" data-id="{{$item->id}}"></td>
                                            @endif
    	                            		<td>{{ $no++ }}</td>
    	                            		<td>{{$item->kd_produk}}</td>
    	                            		<td>{{$item->nm_produk}}</td>
    	                            		<td>{{$item->harga}}</td>
    	                            		<td>{{$item->satuan}}</td>
    	                            		<td>
    	                            			<a href="/produk/fresh/{{$item->id}}/edit">Edit</a>
    	                            		</td>
    	                            	</tr>
    	                            @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @else
                        @if(auth()->user()->role == 'pegawai')
                            <a href="" data-toggle="modal" data-target="#lol" class="btn btn-success">Import Data (.xlsx)</a>
                        @endif
                        <p>Import data barang terlebih dahulu</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                      <div class="modal-header">
                        <h4>Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <div class="modal-body">
                        <form method="post" action="/produk/fresh/add">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Kode Produk</label>
                                <input type="text" class="form-control" name="kd_produk" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" name="nm_produk" required>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" class="form-control" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <input type="text" class="form-control" name="satuan" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/produk/fresh/" class="btn btn-default">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="lol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4>Import Data Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <div class="modal-body">
                        <form action="{{ url('/produk/fresh/excel') }}" method="post" enctype="multipart/form-data">
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
                                <label for="">File (.xls, .xlsx)</label>
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