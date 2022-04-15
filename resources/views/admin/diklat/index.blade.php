@extends('layouts.app')
@section('content')
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