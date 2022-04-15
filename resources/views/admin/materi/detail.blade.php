@extends('layouts.app')
@section('content');
<div class="container">   
    <div class="row">
        <div class="col-sm-12">
            <div class="normal-table-list row" style="margin-top:-20px">
                <div class="col-sm-12">
                    <div class="bsc-tbl-bdr">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Tema</th>
                                    <td>{{$materi->tema_materi}}</td>         
                                </tr>                              
                                <tr>
                                    <th>Nama Pemateri</th>
                                    <td>{{$materi->nama_pemateri}}</td>                    
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{$materi->tanggal}}</td>                       
                                </tr>
                                <tr>
                                    <th>Waktu Mulai</th>
                                    <td>{{$materi->waktu_mulai}}</td>                       
                                </tr>
                                <tr>
                                    <th>Waktu Selesai</th>
                                    <td>{{$materi->waktu_selesai}}</td>                       
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{$materi->status == '1' ? 'SELESAI' : 'BELUM SELESAI'}}</td>                       
                                </tr>                                                                     
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="col-sm-12">
                    <div class="data-table-list">                  
                        <div class="alert alert-success">Absensi - Materi {{$materi->tema_materi}}</div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No Peserta</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No HP</th> 
                                        <th>Status</th>                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($absensi as $res)
                                    <tr>
                                        <td>{{$res->no_peserta}}</td>
                                        <td>{{$res->nama_peserta}}</td>
                                        <td>{{$res->alamat}}</td>
                                        <td>{{$res->no_hp}}</td>
                                        <td>
                                            @if($res->hadir)
                                                <button type="button" class="btn btn-sm btn-success">Hadir</button>
                                            @else 
                                                <button type="button" class="btn btn-sm btn-success">Tidak Hadir</button>
                                            @endif
                                        </td>   
                                    @endforeach
                                    </tr>                                                       
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No Peserta</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <td>Status</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>       
    </div>        
</div>
@endsection
