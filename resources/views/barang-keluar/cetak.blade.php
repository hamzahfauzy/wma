@extends('layouts.print')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="">
                <div class="panel-body">
                    <h2 align="center">Laporan Barang Keluar</h2>
                    <p></p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jumlah Keluar</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
window.print()
</script>
@endsection
