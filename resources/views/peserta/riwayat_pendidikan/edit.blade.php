@extends('layouts.app')
@section('content')
<div class="form-example-area" style="margin-top:30px">
    <div class="container">
        <div class="row">
            <form action="{{route('peserta.riwayatPendidikan.update')}}" method="post">
            @csrf
            <div class="col-sm-12">
                <div class="form-example-wrap">
                    <div class="form-example-int mg-t-15">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                            @endforeach
                        </ul>
                    </div>  
                    @endif                    
                    @if(\Session::has('alert-success'))
                        <div class="alert alert-success">
                            <div>{{ Session::get('alert-success') }}</div>
                        </div>
                    @endif
                        <div class="form-group">
                            <label>Tipe Pendidikan</label>
                            <div class="bootstrap-select fm-cmp-mg">
                                <select name="id_tipe_pendidikan" class="selectpicker" required>
                                    @foreach($tipe_pendidikan as $tipe)
                                        <option value="{{$tipe->id}}" {{$pendidikan->id_tipe_pendidikan == $tipe->id ? 'selected': ''}}>
                                            {{$tipe->nama_tipe}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Nama Instansi</label>
                            <div class="nk-int-st">
                                <input type="text" name="nama_instansi" class="form-control input-sm" value="{{$pendidikan->nama_instansi}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Tahun Masuk</label>
                            <div class="nk-int-st">
                                <input type="text" name="tahun_masuk" class="form-control input-sm" placeholder="2005" value="{{$pendidikan->tahun_masuk}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Tahun Lulus</label>
                            <div class="nk-int-st">
                                <input type="text" name="tahun_lulus" class="form-control input-sm" placeholder="2009" value="{{$pendidikan->tahun_lulus}}" required>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{$pendidikan->id}}" name="id">
                    <button type="submit" class="btn btn-success notika-btn-success">Submit</button>
                    <a href="{{url()->previous()}}" class="btn btn-danger notika-btn-success">Back</a>
                </div>
            </div>
            </form>
        </div>           
    </div>
</div> 

@endsection