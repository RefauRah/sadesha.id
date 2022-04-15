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
                                    <th>Tahun Masuk</th>
                                    <th>Tahun Lulus</th>                                    
                                    <th>Opsi</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @if($riwayat_pendidikan != null)
                                    @foreach($riwayat_pendidikan as $pendidikan)
                                    <tr>
                                        <td>{{$pendidikan->nama_instansi}}</td>
                                        <td>{{$pendidikan->tahun_masuk}}</td>
                                        <td>{{$pendidikan->tahun_lulus}}</td>
                                        <td>
                                            <a href="{{route('peserta.riwayatPendidikan.edit',$pendidikan->id)}}" class="btn btn-sm btn-success">Edit</a>
                                        </td>
                                    </tr>                                       
                                    @endforeach                     
                                @endif          
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Instansi</th>
                                    <th>Tahun Masuk</th>
                                    <th>Tahun Lulus</th>                                    
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
