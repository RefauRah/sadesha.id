@extends('layouts.app')
@section('content')
<div class="data-table-area" style="margin-top:30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">                  
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No Peserta</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th> 
                                    <th>Opsi</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peserta as $res)
                                <tr>
                                    <td>{{$res->no_peserta}}</td> 
                                    <td>{{$res->nama_peserta}}</td>
                                    <td>{{$res->tgl_lahir}}</td>
                                    <td>{{$res->alamat}}</td>
                                    <td>{{$res->jenis_kelamin}}</td>
                                    <td>{{$res->no_hp}}</td>
                                    <td>
                                        <div class="btn-group">
                                        @if($res->is_verified == '0')
                                            <a href="{{route('peserta.verify',$res->id)}}" class="btn btn-default btn-icon-notika" title="Verifikasi" onclick="return confirm('Konfirmasi Peserta?')">
                                                <i class="notika-icon notika-checked"></i></a>
                                        @endif                                            
                                            <!-- <a href="{{route('peserta.edit',$res->id)}}" class="btn btn-default btn-icon-notika" title="Edit"><i class="notika-icon notika-edit"></i></a> -->
                                            <a href="{{route('peserta.delete',$res->id)}}" class="btn btn-default btn-icon-notika" onclick="return confirm('Anda yakin?')" title="Hapus"><i class="notika-icon notika-close"></i></a>
                                            <a href="{{route('peserta.detail',$res->id)}}" class="btn btn-default btn-icon-notika" title="Detail"><i class="notika-icon notika-next"></i></a>                                            
                                        </div> 
                                    </td>                                  
                                </tr>       
                                @endforeach                                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No Peserta</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
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
