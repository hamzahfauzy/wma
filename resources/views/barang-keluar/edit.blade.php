@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Form Edit Data Barang Keluar</div>

                <div class="panel-body">
                    <form method="post" action="{{route('barang-keluar.update')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$barangKeluar->id}}">
                        <div class="form-group{{ $errors->has('barang_id') ? ' has-error' : '' }}">
                            <label>Barang</label>
                            <select class="form-control" name="barang_id">
                                @foreach($barang as $data)
                                <option value="{{$data->id}}" {{$data->id == $barangKeluar->barang_id ? 'selected=""' : ''}}>{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('barang_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('barang_id') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('jumlah_keluar') ? ' has-error' : '' }}">
                            <label>Jumlah Keluar</label>
                            <input type="text" name="jumlah_keluar" class="form-control" value="{{$barangKeluar->jumlah_keluar}}">
                            @if ($errors->has('jumlah_keluar'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('jumlah_keluar') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('bulan') ? ' has-error' : '' }}">
                            <label>Bulan</label>
                            <select class="form-control" name="bulan">
                                @foreach($bulan as $key => $value)
                                <option value="{{$key}}" {{$key == $barangKeluar->bulan ? 'selected=""' : ''}}>{{$value}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('bulan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('bulan') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('tahun') ? ' has-error' : '' }}">
                            <label>Tahun</label>
                            <input type="number" name="tahun" class="form-control" value="{{$barangKeluar->tahun}}">
                            @if ($errors->has('tahun'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tahun') }}</strong>
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
