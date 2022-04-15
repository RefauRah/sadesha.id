@extends('layouts.app')
@section('content')
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30"> 
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">{{$count_diklat}}</span></h2>
                        <p>Total Diklat</p>
                    </div>
                    <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">{{$count_peserta}}</span></h2>
                        <p>Total Peserta</p>
                    </div>
                    <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">{{$count_materi}}</span></h2>
                        <p>Total Materi</p>
                    </div>
                    <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">{{$count_pendaftar}}</span></h2>
                        <p>Total Pendaftar</p>
                    </div>
                    <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="data-table-area" style="margin-top:30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">                  
                    <div class="table-responsive">
                        <table id="tabel-diklat" class="table table-striped table-diklat">
                            <thead>
                                <tr>
                                    <th>Nama Diklat</th>
                                    <th>Kota</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Status</th>
                                    <th>Opsi</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($diklat as $res)
                                <tr class="{{$res->status=='1'?'row-active':''}}">       
                                    <td>{{$res->nama_diklat}}</td>
                                    <td>{{$res->kota->nama_kota}}</td>
                                    <td>{{$res->tgl_mulai}}</td>
                                    <td>{{$res->tgl_selesai}}</td>
                                    <td>
                                        <button class="btn btn-sm {{$res->status == '1' ? 'btn-success' : ($res->status == '2' ? 'btn-warning' : 'btn-danger')}}">
                                            {{$res->status == '1' ? 'DIBUKA' : ($res->status == '2' ? 'DITUTUP' : 'SELESAI')}}
                                        </button>
                                    </td>
                                    <td>
                                     <div class="btn-group">
                                        <form action="{{route('diklat.delete')}}" method="post">
                                            <a href="{{route('diklat.edit',$res->id)}}" class="btn btn-default btn-icon-notika" title="Edit">
                                                <i class="notika-icon notika-edit"></i>
                                            </a> 
                                            @csrf
                                            @if($res->status != '1')
                                            <input type="hidden" value="{{$res->id}}" name="id">
                                            <button type="submit" onclick="return confirm('Anda yakin?')" 
                                                class="btn btn-default btn-icon-notika">
                                                <i class="notika-icon notika-close"></i>
                                            </button>
                                            @endif 
                                            <a href="{{route('materi.all')}}{{$res->status!='1' ? '?id_diklat='.$res->id : ''}}" class="btn btn-default btn-icon-notika" title="Daftar Materi">
                                                <i class="notika-icon notika-next"></i>
                                            </a>
                                        </form>
                                    </div>  
                                    </td>
                                </tr>                    
                                @endforeach                                   
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Diklat</th>
                                    <th>Kota</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Status</th>
                                    <th>Opsi</th>                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#tabel-diklat').DataTable( {
            "order": [[ 4, "asc" ]]
        } );
    } );
</script>
@endsection