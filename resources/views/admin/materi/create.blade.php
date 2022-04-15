@extends('layouts.app')
@section('content')
<div class="form-example-area" style="margin-top:30px">
    <div class="container">
        <div class="row">
            <form action="{{route('materi.store')}}" method="post">
            @csrf
            <div class="col-sm-12">
                <div class="form-example-wrap">
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Tema Materi</label>
                            <div class="nk-int-st">
                                <input type="text" name="tema_materi" class="form-control input-sm" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Nama Pemateri</label>
                            <div class="nk-int-st">
                                <input type="text" name="nama_pemateri" class="form-control input-sm" required>
                            </div>
                        </div>
                    </div>
                    <div class="datepicker-int datepicker-restyle  mg-t-15">
                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                            <label>Tanggal</label>
                            <div class="input-group date nk-int-st">
                                <span class="input-group-addon"></span>
                                <input type="text" name="tanggal" class="form-control" value="{{date('m/d/Y')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Waktu Mulai</label>
                            <div class="nk-int-st">
                                <input type="text" name="waktu_mulai" placeholder="08:00" class="form-control input-sm" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Waktu Selesai</label>
                            <div class="nk-int-st">
                                <input type="text" name="waktu_selesai" placeholder="09:00" class="form-control input-sm" required>
                            </div>
                        </div>
                    </div>
                    @if(request()->get('id_diklat') && request()->get('id_diklat') > 0)
                    <input type="hidden" value="{{request()->get('id_diklat')}}" name="id">
                    @endif
                    <button type="submit" class="btn btn-success notika-btn-success">Submit</button>
                    <a href="{{url()->previous()}}" class="btn btn-danger notika-btn-success">Back</a>
                </div>
            </div>
            </form>
        </div>           
    </div>
</div> 

@endsection