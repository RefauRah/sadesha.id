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
                                    <th>Nama Organisasi</th>
                                    <th>Jabatan</th>
                                    <th>Tahun</th>                                 
                                    <th>Opsi</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @if($pengalaman_organisasi != null)
                                    @foreach($pengalaman_organisasi as $organisasi)                                   
                                    <tr>
                                        <td>{{$organisasi->nama_organisasi}}</td>
                                        <td>{{$organisasi->jabatan}}</td>
                                        <td>{{$organisasi->tahun}}</td>
                                        <td>
                                            <a href="{{route('peserta.pengalamanOrganisasi.edit',$organisasi->id)}}" class="btn btn-sm btn-success">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach                                 
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>                                    
                                    <th>Nama Organisasi</th>
                                    <th>Jabatan</th>
                                    <th>Tahun</th>                                 
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
