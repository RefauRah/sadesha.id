@extends('layouts.app')
@section('content')
<div class="data-table-area" style="margin-top:30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">                  
                    <div class="table-responsive">
                        <table id="tabel-faq" class="table table-striped table-faq">
                            <thead>
                                <tr>                                    
                                    <th>Question</th>
                                    <th>Answer</th>                                   
                                    <th>Opsi</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($faq as $res)
                                <tr>       
                                    <td>{{$res->question}}</td> 
                                    <td>{{$res->answer}}</td>                                                                                                           
                                    <td>
                                     <div class="btn-group">
                                        <form action="{{route('faq.delete')}}" method="post">
                                            <a href="{{route('faq.edit',$res->id)}}" class="btn btn-default btn-icon-notika" title="Edit">
                                                <i class="notika-icon notika-edit"></i>
                                            </a> 
                                            @csrf                                            
                                            <input type="hidden" value="{{$res->id}}" name="id">
                                            <button type="submit" onclick="return confirm('Anda yakin?')" 
                                                class="btn btn-default btn-icon-notika">
                                                <i class="notika-icon notika-close"></i>
                                            </button>                                                                                        
                                        </form>
                                    </div>  
                                    </td>
                                </tr>                    
                                @endforeach                                   
                            </tbody>
                            <tfoot>
                                <tr>                                    
                                    <th>Question</th>
                                    <th>Answer</th>                                   
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
        $('#tabel-faq').DataTable();
    } );
</script>
@endsection