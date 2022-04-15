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
                                <button data-toggle="tooltip" data-placement="left" title="Save" class="btn"><i class="notika-icon notika-checked"></i></button>                                
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>
                                        <input type="radio">
                                    </td>                                                                   
                                </tr>                                                       
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No Peserta</th>
                                    <th>Nama</th>                                    
                                    <th>Alamat</th>                                                                       
                                    <th>Kehadiran</th>
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