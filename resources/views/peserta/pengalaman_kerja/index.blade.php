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
                                    <th>Nama Instansi</th>
                                    <th>Jabatan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>                                    
                                    <th>Opsi</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @if($pengalaman_kerja != null)
                                    @foreach($pengalaman_kerja as $kerja)                                   
                                    <tr>
                                        <td>{{$kerja->nama_instansi}}</td>
                                        <td>{{$kerja->jabatan}}</td>
                                        <td>{{$kerja->tgl_mulai}}</td>
                                        <td>{{$kerja->tgl_selesai}}</td>
                                        <td>
                                            <a href="{{route('peserta.pengalamanKerja.edit',$kerja->id)}}" class="btn btn-sm btn-success">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Instansi</th>
                                    <th>Jabatan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>                                    
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
