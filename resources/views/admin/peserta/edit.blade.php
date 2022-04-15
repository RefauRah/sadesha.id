@extends('layouts.app')
@section('content')
<div class="tabs-info-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="widget-tabs-int">
                    <div class="tab-hd">
                        <h2>Edit Data Peserta</h2>                            
                    </div>
                    <div class="widget-tabs-list">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Data Diri</a></li>
                            <li><a data-toggle="tab" href="#menu1">Pengalaman Organisasi</a></li>
                            <li><a data-toggle="tab" href="#menu2">Pengalaman Kerja</a></li>
                        </ul>
                        <div class="tab-content tab-custom-st">
                            <div id="home" class="tab-pane fade in active">
                                <div class="form-example-area" style="margin-top:30px">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-example-wrap">                                                        
                                                    <div class="form-example-int">
                                                        <div class="form-group">
                                                            <label>Nama Diklat</label>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-example-int">
                                                        <div class="form-group">
                                                            <label>Nomor Peserta</label>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-example-int mg-t-15">
                                                        <div class="form-group">
                                                            <label>Nama Peserta</label>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-example-int mg-t-15">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <div class="nk-int-st">
                                                                <input type="date" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-example-int mg-t-15">
                                                        <div class="form-group">
                                                            <label>Jenis Kelamin</label>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-example-int mg-t-15">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>                 
                                                    <div class="form-example-int">
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <div class="nk-int-st">
                                                                <textarea name="" id="" cols="150" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                    <div class="form-example-int mg-t-15">
                                                        <div class="form-group">
                                                            <label>Nomor HP</label>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>  
                                                    <div class="form-example-int mg-t-15">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="form-example-int mg-t-15">
                                                        <button class="btn btn-success notika-btn-success">Submit</button>                                                            
                                                    </div>                                   
                                                </div>
                                            </div>
                                        </div>           
                                    </div>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="form-example-area" style="margin-top:30px">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-example-wrap">                                                       
                                                    <div class="form-example-int">
                                                        <div class="form-group">
                                                            <label>Nama Organisasi</label>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-example-int">
                                                        <div class="form-group">
                                                            <label>Jabatan</label>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-example-int mg-t-15">
                                                        <div class="form-group">
                                                            <label>Tahun</label>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>                                                       
                                                    <div class="form-example-int mg-t-15">
                                                        <button class="btn btn-success notika-btn-success">Submit</button>                                                           
                                                    </div>                                   
                                                </div>
                                            </div>
                                        </div>           
                                    </div>
                                </div>                                 
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <div class="form-example-area" style="margin-top:30px">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-example-wrap">                                                     
                                                    <div class="form-example-int">
                                                        <div class="form-group">
                                                            <label>Nama Instansi</label>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-example-int">
                                                        <div class="form-group">
                                                            <label>Jabatan</label>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-example-int mg-t-15">
                                                        <div class="form-group">
                                                            <label>Tanggal Mulai</label>
                                                            <div class="nk-int-st">
                                                                <input type="date" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-example-int mg-t-15">
                                                        <div class="form-group">
                                                            <label>Tanggal Selesai</label>
                                                            <div class="nk-int-st">
                                                                <input type="date" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>                                                        
                                                    <div class="form-example-int mg-t-15">
                                                        <button class="btn btn-success notika-btn-success">Submit</button>                                                            
                                                    </div>                                   
                                                </div>
                                            </div>
                                        </div>           
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>            
@endsection