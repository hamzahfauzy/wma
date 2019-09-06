@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Data Barang Keluar</div>

                <div class="panel-body">
                    <a href="{{route('barang-keluar.create')}}" class="btn btn-primary">+ Buat Data</a>
                    <p></p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jumlah Keluar</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($model) || count($model) == 0)
                            <tr>
                                <td colspan="5"><i>Tidak ada data</i></td>
                            </tr>
                            @endif

                            @foreach($model as $key => $data)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$data->barang->nama}}</td>
                                <td>{{$data->jumlah_keluar}}</td>
                                <td>{{$bulan[$data->bulan]}}</td>
                                <td>{{$data->tahun}}</td>
                                <td>
                                    <a href="{{route('barang-keluar.edit',$data->id)}}">Edit</a> | 
                                    <a href="{{route('barang-keluar.delete',$data->id)}}">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
