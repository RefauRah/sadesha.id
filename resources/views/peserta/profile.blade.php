@extends('layouts.app')
@section('content');
<div class="container">   
    <div style="background: #fff"> 
    <div class="row" style="padding-top:30px">
        <div class="col-sm-10 col-sm-offset-1">
            @if($peserta==null)
            <div class="alert alert-danger row">
                <div class="col-xs-6" style="padding-top:5px">Data diri belum diisi</div>
                <div class="col-xs-6 pull-right">
                    <a href="{{route('peserta.dataDiri')}}" class="pull-right btn btn-warning btn-sm">
                    Isi sekarang</a>
                </div>
            </div>
            @endif
            @if( $pendidikan == null || count($pendidikan) == 0)
            <div class="alert alert-danger row">
                <div class="col-xs-6" style="padding-top:5px">Riwayat Pendidikan belum diisi</div>
                <div class="col-xs-6 pull-right">
                    <a href="{{route('peserta.riwayatPendidikan.create')}}" class="pull-right btn btn-warning btn-sm">
                    Isi sekarang</a>
                </div>
            </div>
            @endif
            @if($kerja == null || count($kerja) == 0)
            <div class="alert alert-danger row">
                <div class="col-xs-6" style="padding-top:5px">Pengalaman bekerja belum diisi</div>
                <div class="col-xs-6 pull-right">
                    <a href="{{route('peserta.pengalamanKerja.create')}}" class="pull-right btn btn-warning btn-sm">
                    Isi sekarang</a>
                </div>
            </div>
            @endif
            @if( $organisasi == null || count($organisasi) == 0)
            <div class="alert alert-danger row">
                <div class="col-xs-6" style="padding-top:5px">Pengalaman organisasi belum diisi</div>
                <div class="col-xs-6 pull-right">
                    <a href="{{route('peserta.pengalamanOrganisasi.create')}}" class="pull-right btn btn-warning btn-sm">
                    Isi sekarang</a>
                </div>
            </div>
            @endif
            
            <div class="alert alert-info row">
                <div class="col-xs-6" style="padding-top:5px">Mohon lengkapi data diri untuk mencetak biodata</div>
                <div class="col-xs-6 pull-right">
                @if($peserta != null && $peserta->is_verified == '1')
                    <a href="{{route('peserta.printBiodata')}}" target="_blank" class="pull-right btn btn-success btn-sm">
                    Cetak Biodata Sekarang</a>
                @endif                    
                </div>
            </div>
            <div class="normal-table-list" style="margin-top:-20px">
                <div class="basic-tb-hd">
                    <h2>Data Diri</h2>            
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="bsc-tbl-bdr">
                            <table class="table table-no-bordered">
                                <tbody>
                                    <tr>
                                        <th>Tipe Peserta</th>
                                        <td>{{$peserta != null ? $peserta->tipe_peserta : '-' }}</td>         
                                    </tr> 
                                    <tr>
                                        <th>Nomor Peserta</th>
                                        <td>{{$peserta != null ? $peserta->no_peserta : '-' }}</td>         
                                    </tr>                              
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td>{{$peserta != null ? $peserta->nama_peserta : '-' }}</td>                    
                                    </tr>
                                    <tr>
                                        <th>Asal Kota</th>
                                        <td>{{$peserta != null ? $peserta->nama_kota : '-' }}</td>                    
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>{{$peserta != null ? $peserta->tgl_lahir : '-' }}</td>                       
                                    </tr>

                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>{{$peserta != null ? $peserta->jenis_kelamin : '-' }}</td>                       
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{$peserta != null ? $peserta->status : '-' }}</td>                       
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{$peserta != null ? $peserta->alamat : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor HP</th>
                                        <td>{{$peserta != null ? $peserta->no_hp : '-' }}</td>                       
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$peserta != null ? $peserta->email : '-' }}</td>                       
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    @if($peserta != null && $peserta->is_verified == '1')
                        <img src="{{asset('images/'.$peserta->qr_code)}}" alt="">
                    @endif
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="normal-table-list" style="margin-top:-20px">
                <div class="basic-tb-hd">
                    <h2>Riwayat Pendidikan</h2>            
                </div>
                <div class="bsc-tbl-bdr">
                    <table class="table table-no-bordered">
                        <thead>
                            <tr>
                                <th>Nama Instansi</th>
                                <th>Tahun Masuk</th>
                                <th>Tahun Lulus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($pendidikan != null && count($pendidikan) > 0)
                                @foreach($pendidikan as $pddkn)
                                    <tr>
                                        <td>{{$pddkn->nama_instansi}}</td>
                                        <td>{{$pddkn->tahun_masuk}}</td>
                                        <td>{{$pddkn->tahun_lulus}}</td>
                                    </tr>
                                @endforeach 
                            @else
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            @endif                                                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="normal-table-list" style="margin-top:-20px">
                <div class="basic-tb-hd">
                    <h2>Pengalaman Organisasi</h2>            
                </div>
                <div class="bsc-tbl-bdr">
                    <table class="table table-no-bordered">
                        <thead>
                            <tr>
                                <th>Nama Organisasi</th>
                                <th>Jabatan</th>
                                <th>Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($organisasi != null && count($organisasi) > 0)
                                @foreach($organisasi as $org)
                                    <tr>
                                        <td>{{$org->nama_organisasi}}</td>
                                        <td>{{$org->jabatan}}</td>
                                        <td>{{$org->tahun}}</td>
                                    </tr>
                                @endforeach 
                            @else
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            @endif                                    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="normal-table-list" style="margin-top:-20px">
                <div class="basic-tb-hd">
                    <h2>Pengalaman Bekerja</h2>            
                </div>
                <div class="bsc-tbl-bdr">
                    <table class="table table-no-bordered">
                        <thead>
                            <tr>
                                <th>Nama Instansi</th>
                                <th>Jabatan</th>
                                <th>Tanggal Mulai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($kerja != null && count($kerja) > 0)
                                @foreach($kerja as $krj)
                                    <tr>
                                        <td>{{$krj->nama_instansi}}</td>
                                        <td>{{$krj->jabatan}}</td>
                                        <td>{{$krj->tgl_mulai}}</td>
                                    </tr>
                                @endforeach 
                            @else
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            @endif                                    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>     
    </div>   
</div>
@endsection