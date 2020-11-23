@extends('layouts.web')
@section('title','Pemesanan Produk Retur')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pemesanan Produk NutriFood Retur</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" id="dynamic_form">
                        <span id="result"></span>
                            <table class="table table-bordered table-striped" id="user_table">
                                <thead>
                                    <tr>
                                        <th>Nama Pegawai</th>
                                        <th>No Telp.</th>
                                        <th>Dept.</th>
                                        <th>Cabang</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" align="right">&nbsp;</td>
                                        <td>
                                            @csrf
                                            <input type="submit" name="save" id="save" class="btn btn-primary" value="Simpan" />
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                        <a href="/" class="btn">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<script>
    $(document).ready(function(){

        var count = 1;

        dynamic_field(count);

        function dynamic_field(number)
        {
                html = '<tr>';
                html += '<td><input type="text" name="nm_pegawai[]" class="form-control" required /></td>';
                html += '<td><input type="text" name="nohp[]" class="form-control" required /></td>';
                html += '<td><input type="text" name="departemen[]" class="form-control" required /></td>';
                html += '<td><select name="cabang[]" required><option value="">-pilih cabang-</option><option value="cibitung">Cibitung</option><option value ="ciawi">Ciawi</option><option value ="jakarta">Jakarta</option><option value ="sentul">Sentul</option></select></td>';
                html += '<td><select name="product[]" class="form-control" required><option value="">-pilih produk-</option>@foreach($product as $item)@if($item->stok > 0) <option value="{{$item->nm_produk}}">{{$item->nm_produk}} (<small>Rp.{{$item->harga}}</small>) (<small>{{$item->satuan}}</small>) (<small>{{$item->stok}}</small>)</option> @else <option value="{{$item->nm_produk}}" disabled>{{$item->nm_produk}} (Barang Habis)@endif @endforeach</select></td>';
                html += '<td><input type="number" name="jumlah[]" class="form-control" min="1" required max="{{$item->jumlah}}"/></td>';
                if(number > 1)
                {
                    html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Hapus</button></td></tr>';
                    $('tbody').append(html);
                }
                else
                {   
                    html += '<td><button type="button" name="add" id="add" class="btn btn-success">Tambah</button></td></tr>';
                    $('tbody').html(html);
                }
        }
        $(document).on('click', '#add', function(){
          count++;
          dynamic_field(count);
        });

        $(document).on('click', '.remove', function(){
          count--;
          $(this).closest("tr").remove();
        });
        $('#dynamic_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:'{{ route("add_retur") }}',
                method:'post',
                data:$(this).serialize(),
                dataType:'json',
                success:function(data)
                {
                    if(data.error)
                    {
                        var error_html = '';
                        for(var count = 0; count < data.error.length; count++)
                        {
                            error_html += '<p>'+data.error[count]+'</p>';
                        }
                        $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                    }
                    else
                    {
                        dynamic_field(1);
                        $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                    }
                    $('#save').attr('disabled', false);
                }
            })
        });

    });
</script>
@stop

