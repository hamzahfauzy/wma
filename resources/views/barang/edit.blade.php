@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Form Edit Data Perlengkapan</div>

                <div class="panel-body">
                    <form method="post" action="{{route('barang.update')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$barang->id}}">
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$barang->nama}}">
                            @if ($errors->has('nama'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('jumlah_stok') ? ' has-error' : '' }}">
                            <label>Stok</label>
                            <input type="text" name="jumlah_stok" class="form-control" value="{{$barang->jumlah_stok}}">
                            @if ($errors->has('jumlah_stok'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('jumlah_stok') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button class="btn btn-success">Simpan</button>
                        <a href="{{route('barang.index')}}" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
