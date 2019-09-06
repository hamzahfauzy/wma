@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Barang dan Bobot</div>

                <div class="panel-body">
                    <form>
                    <div class="form-group">
                        <label>Pilih Barang</label>
                        <select class="form-control" name="barang" required="">
                            <option value="">Pilih Barang</option>
                            @foreach($barang as $b)
                            <option value="{{$b->id}}" {{isset($_GET['barang']) && $_GET['barang'] == $b->id ? 'selected=""' : ''}}>{{$b->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bobot</label>
                        <input type="number" class="form-control" name="bobot" value="{{isset($_GET['bobot']) ? $_GET['bobot'] : ''}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Hitung</button>
                    </div>
                    </form>
                </div>
            </div>

            @if(!empty($barangTampil))
            <div class="cetak">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="judul">Peramalan</span>
                    <a href="#" class="btn-cetak btn btn-warning pull-right" onclick="cetak()">Cetak</a>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div>
                        <table class="table table-bordered">
                            <tr>
                                <td>No</td>
                                <td>Bulan</td>
                                <td>Tahun</td>
                                <td>Jumlah Keluar</td>
                                <td>Forecast {{$_GET['bobot']}}</td>
                            </tr>
                            @php
                            $total_bobot = 0;
                            $bobot_periode = [];
                            $i = $_GET['bobot'];
                            while($i>0)
                            {
                                $total_bobot += $i;
                                $i--;
                            }
                            $last_jumlah = 0;
                            @endphp
                            @foreach($barangTampil->keluars()->orderby('bulan','asc')->get() as $key => $value)
                                @if($key < $_GET['bobot'])
                                    @php
                                    $bobot_periode[] = $value->jumlah_keluar; 
                                    @endphp
                                @elseif($key == $_GET['bobot'])
                                    @php
                                    $bobot_periode[] = $value->jumlah_keluar; 
                                    @endphp
                                @else
                                    @php 
                                    array_shift($bobot_periode);
                                    $bobot_periode[] = $value->jumlah_keluar; 
                                    @endphp
                                @endif
                                @php $last_jumlah = $value->jumlah_keluar @endphp
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$bulan[$value->bulan]}}</td>
                                <td>{{$value->tahun}}</td>
                                <td>{{$value->jumlah_keluar}}</td>
                                @if($key <= $_GET['bobot'])
                                <td></td>
                                @else
                                @php
                                $forecast = 0;
                                $forecast_label = "";
                                for($i = $_GET['bobot']-1; $i>=0; $i--)
                                {
                                    $forecast_label .= "($bobot_periode[$i] * ".($i+1).")";
                                    $forecast += ($bobot_periode[$i] * ($i+1));
                                }
                                $forecast = $forecast/$total_bobot
                                @endphp
                                <td>{{round($forecast)}}</td>
                                @endif
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">ERROR MAD</div>

                <div class="panel-body">
                    <div>
                        <table class="table table-bordered">
                            <tr>
                                <td>No</td>
                                <td>Bulan</td>
                                <td>Tahun</td>
                                <td>Jumlah Keluar</td>
                                <td>Forecast {{$_GET['bobot']}}</td>
                                <td>|ERROR|</td>
                            </tr>
                            @php
                            $total_bobot = 0;
                            $bobot_periode = [];
                            $i = $_GET['bobot'];
                            $total_error = 0;
                            while($i>0)
                            {
                                $total_bobot += $i;
                                $i--;
                            }
                            $last_jumlah = 0;
                            @endphp
                            @foreach($barangTampil->keluars()->orderby('bulan','asc')->get() as $key => $value)
                                @if($key < $_GET['bobot'])
                                    @php
                                    $bobot_periode[] = $value->jumlah_keluar; 
                                    @endphp
                                @elseif($key == $_GET['bobot'])
                                    @php
                                    $bobot_periode[] = $value->jumlah_keluar; 
                                    @endphp
                                @else
                                    @php 
                                    array_shift($bobot_periode);
                                    $bobot_periode[] = $value->jumlah_keluar; 
                                    @endphp
                                @endif
                                @php $last_jumlah = $value->jumlah_keluar @endphp
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$bulan[$value->bulan]}}</td>
                                <td>{{$value->tahun}}</td>
                                <td>{{$value->jumlah_keluar}}</td>
                                @if($key <= $_GET['bobot'])
                                <td></td>
                                <td></td>
                                @else
                                @php
                                $forecast = 0;
                                $forecast_label = "";
                                for($i = $_GET['bobot']-1; $i>=0; $i--)
                                {
                                    $forecast_label .= "($bobot_periode[$i] * ".($i+1).")";
                                    $forecast += ($bobot_periode[$i] * ($i+1));
                                }
                                $forecast = $forecast/$total_bobot
                                @endphp
                                <td>{{round($forecast)}}</td>
                                <td>{{abs($value->jumlah_keluar-round($forecast))}}</td>
                                @php $total_error += abs($value->jumlah_keluar-round($forecast)) @endphp
                                @endif
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{$total_error}}</td>
                            </tr>
                        </table>
                        <p>Error adalah {{round($total_error/($barangTampil->keluars()->orderby('bulan','asc')->count()-$_GET['bobot']))}}</p>
                    </div>
                </div>
            </div>
            </div>
            @endif

        </div>
    </div>
</div>
<script type="text/javascript">
    
function cetak()
{
    var bodyOld = document.body.innerHTML;
    var printTag = document.querySelector('.cetak').innerHTML;
    document.body.innerHTML = printTag
    document.querySelector('.btn-cetak').style.display = "none"
    document.querySelector('.judul').innerHTML = "<center>Laporan Peramalan</center>"
    window.print()
    document.body.innerHTML = bodyOld
}
</script>
@endsection
