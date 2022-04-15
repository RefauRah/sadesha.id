@extends('layouts.app')
@section('content')
<div class="form-example-area" style="margin-top:30px">
    <div class="container">
        <div class="row">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <form action="{{route('diklat.update')}}" method="post">
            @csrf
            <div class="col-sm-12">
                <div class="form-example-wrap">
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Nama Diklat</label>
                            <div class="nk-int-st">
                                <input type="text" name="nama_diklat" class="form-control input-sm" value="{{$diklat->nama_diklat}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int mg-t-15">
                        <div class="form-group">
                            <label>Nama Kota</label>
                            <div class="bootstrap-select fm-cmp-mg">
                                <select name="id_kota" class="selectpicker" data-live-search="true" required>
                                    @foreach($kota as $res)
                                        <option value="{{$res->id}}" {{$res->id == $diklat->id_kota ? 'selected' : ''}}>
                                            {{$res->nama_kota}}
                                        </option>
                                    @endforeach()
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="datepicker-int datepicker-restyle  mg-t-15">
                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                            <label>Tanggal Mulai</label>
                            <div class="input-group date nk-int-st">
                                <span class="input-group-addon"></span>
                                <input type="text" name="tgl_mulai" class="form-control" value="{{date('m/d/Y',strtotime($diklat->tgl_mulai))}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="datepicker-int datepicker-restyle">
                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                            <label>Tanggal Selesai</label>
                            <div class="input-group date nk-int-st">
                                <span class="input-group-addon"></span>
                                <input type="text" name="tgl_selesai" class="form-control" value="{{date('m/d/Y',strtotime($diklat->tgl_selesai))}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int mg-t-15">
                        <div class="form-group">
                            <label>Status Diklat</label>
                            <div class="bootstrap-select fm-cmp-mg">
                                <select name="status" class="selectpicker" required>
                                    <option value="1" {{$diklat->status=='1'?'selected':''}}>DIBUKA</option>
                                    <option value="2" {{$diklat->status=='2'?'selected':''}}>DITUTUP</option>
                                    <option value="3" {{$diklat->status=='3'?'selected':''}}>SELESAI</option>
                                </select>
                            </div>
                        </div>
                    </div>           
                    <input type="hidden" name="id" value="{{$diklat->id}}">
                    <button type="submit" class="btn btn-success notika-btn-success">Submit</button>
                    <a href="{{url()->previous()}}" class="btn btn-danger notika-btn-success">Back</a>
                </div>
            </div>
            </form>
        </div>           
    </div>
</div> 

@endsection