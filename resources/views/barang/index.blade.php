@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Data Perlengkapan</div>

                <div class="panel-body">
                    <a href="{{route('barang.create')}}" class="btn btn-primary">+ Buat Data</a>
                    <p></p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Stok</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($model) || count($model) == 0)
                            <tr>
                                <td colspan="4"><i>Tidak ada data</i></td>
                            </tr>
                            @endif

                            @foreach($model as $key => $data)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->jumlah_stok}}</td>
                                <td>
                                    <a href="{{route('barang.edit',$data->id)}}">Edit</a> | 
                                    <a href="{{route('barang.delete',$data->id)}}">Hapus</a>
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
