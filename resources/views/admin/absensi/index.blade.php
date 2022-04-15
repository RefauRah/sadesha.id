@extends('layouts.app')
@section('content')
<div class="breadcomb-area " style="margin-top:30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-windows"></i>
                                </div>
                                <div class="breadcomb-ctn">                                                                   
                                    <h2>Data Absensi Peserta</h2>     
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Print" class="btn"><i class="notika-icon notika-sent"></i></button>
                                <a href="{{url('/absensi/create')}}" data-toggle="tooltip" data-placement="left" title="Tambah Absensi" class="btn"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
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
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No Peserta</th>
                                    <th>Nama</th>                                    
                                    <th>Alamat</th>                                                                       
                                    <th>Kehadiran</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>  
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{url('/absensi/edit')}}" class="btn btn-default btn-icon-notika" title="Edit"><i class="notika-icon notika-edit"></i></a>
                                            <a href="{{url('/peserta/detail')}}" class="btn btn-default btn-icon-notika" title="Detail"><i class="notika-icon notika-tax"></i></a>                                            
                                        </div>
                                    </td>                                                                 
                                </tr>                                                       
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No Peserta</th>
                                    <th>Nama</th>                                    
                                    <th>Alamat</th>                                                                       
                                    <th>Kehadiran</th>
                                    <th>Option</th>
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