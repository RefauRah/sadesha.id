@extends('layouts.app')
@section('content')
<div class="data-table-area" style="margin-top:30px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            </div>
            <div class="col-sm-12">
                <div class="data-table-list">  
                    <div class="table-responsive">
                        <table id="tabel-materi" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tema Materi</th>
                                    <th>Pemateri</th>
                                    <th>Tanggal</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Status</th>         
                                    <th>Opsi</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($materi as $res)
                                <tr>       
                                    <td>{{$res->tema_materi}}</td>
                                    <td>{{$res->nama_pemateri}}</td>
                                    <td>{{$res->tanggal}}</td>
                                    <td>{{$res->waktu_mulai}}</td>
                                    <td>{{$res->waktu_selesai}}</td>
                                    <td>
                                        <button class="btn btn-sm {{$res->status == '0' ? 'btn-success' : 'btn-danger'}}">
                                            {{$res->status == '0' ? 'BELUM SELESAI' : 'SELESAI'}}
                                        </button>
                                    </td>
                                    <td>
                                     <div class="btn-group">
                                        <form action="{{route('materi.delete')}}" method="post">
                                            <a href="{{route('materi.edit',$res->id)}}" class="btn btn-default btn-icon-notika" title="Edit">
                                                <i class="notika-icon notika-edit"></i>
                                            </a> 
                                            @csrf
                                            @if($res->status!='1')
                                                <input type="hidden" value="{{$res->id}}" name="id">
                                                @if(isset($_GET['id_diklat']))
                                                <input type="hidden" value="{{$_GET['id_diklat']}}" name="id_diklat">
                                                @endif
                                                <button type="submit" onclick="return confirm('Anda yakin?')" 
                                                    class="btn btn-default btn-icon-notika">
                                                    <i class="notika-icon notika-close"></i>
                                                </button>
                                            @endif
                                            @if(!isset($_GET['id_diklat']))
                                            <a href="{{route('materi.detail',$res->id)}}" class="btn btn-default btn-icon-notika" title="Detail">
                                                <i class="notika-icon notika-next"></i>
                                            </a>
                                            @endif
                                        </form>
                                    </div>  
                                    </td>
                                </tr>                    
                                @endforeach                                   
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tema Materi</th>
                                    <th>Pemateri</th>
                                    <th>Tanggal</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
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
        $('#tabel-materi').DataTable( {
            "order": [[ 5, "asc" ]]
        } );
    } );
</script>
@endsection