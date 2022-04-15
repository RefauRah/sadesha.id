@extends('layouts.app')
@section('content')
<div class="form-example-area" style="margin-top:30px">
    <div class="container">
        <div class="row">
            <form action="{{route('peserta.dataDiriUpdate')}}" method="post">
            @csrf
            <div class="col-sm-12">
                <div class="form-example-wrap">
                    <div class="form-example-int">
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
                            <label>Nama Peserta</label>
                            <div class="nk-int-st">
                                <input type="text" name="nama_peserta" class="form-control input-sm" value="{{$peserta != null ? $peserta->nama_peserta: ''}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Email</label>
                            <div class="nk-int-st">
                                <input type="text" name="email" class="form-control input-sm" value="{{$peserta != null ? $peserta->email: ''}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int mg-t-15">
                        <div class="form-group">
                            <label>Asal Kota</label>
                            <div class="bootstrap-select fm-cmp-mg">
                                <select name="id_kota" class="selectpicker" data-live-search="true" required>
                                @foreach($kota as $res)
                                    <option value="{{$res->id}}" {{$peserta != null && $res->id == $peserta->id_kota ? 'selected' : ''}}>
                                        {{$res->nama_kota}}
                                    </option>
                                @endforeach()
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="datepicker-int datepicker-restyle  mg-t-15">
                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                            <label>Tanggal Lahir</label>
                            <div class="input-group date nk-int-st">
                                <span class="input-group-addon"></span>
                                <input type="text" name="tgl_lahir" class="form-control" value="{{$peserta != null ? date('m/d/Y', strtotime($peserta->tgl_lahir)) : date('m/d/1995')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Alamat</label>
                            <div class="nk-int-st">
                                <textarea name="alamat" class="form-control">{{$peserta != null ? $peserta->alamat : ''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int mg-t-15">
                        <div class="form-group">
                            <label>Tipe Peserta</label>
                            <div class="bootstrap-select fm-cmp-mg">
                                <select name="tipe_peserta" class="selectpicker" required>
                                @if($peserta!=null)
                                    <option {{$peserta->tipe_peserta == 'Beasiswa' ? 'selected' : ''}} value="Beasiswa">Beasiswa</option>
                                    <option {{$peserta->tipe_peserta == 'Pengabdian' ? 'selected' : ''}} value="Pengabdian">Pengabdian</option>
                                @else 
                                    <option value="Beasiswa">Beasiswa</option>
                                    <option value="Pengabdian">Pengabdian</option>
                                @endif
                                </select>
                            </div>
                        </div>
                    </div>  
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>No. HP</label>
                            <div class="nk-int-st">
                                <input type="text" name="no_hp" class="form-control input-sm" value="{{$peserta != null ? $peserta->no_hp : ''}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int mg-t-15">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="bootstrap-select fm-cmp-mg">
                                <select name="jenis_kelamin" class="selectpicker" required>
                                @if($peserta!=null)
                                    <option {{$peserta->jenis_kelamin == 'Laki Laki' ? 'selected' : ''}} value="Laki Laki">Laki Laki</option>
                                    <option {{$peserta->jenis_kelamin == 'Perempuan' ? 'selected' : ''}} value="Perempuan">Perempuan</option>
                                @else 
                                    <option value="Laki Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                @endif
                                </select>
                            </div>
                        </div>
                    </div>  
                    <div class="form-example-int mg-t-15">
                        <div class="form-group">
                            <label>Status Peserta</label>
                            <div class="bootstrap-select fm-cmp-mg">
                                <select name="status" class="selectpicker" required>
                                @if($peserta!=null)
                                    <option {{$peserta->status == 'MAHASISWA' ? 'selected' : ''}} value="MAHASISWA">MAHASISWA</option>
                                    <option {{$peserta->status == 'PELAJAR' ? 'selected' : ''}} value="PELAJAR">PELAJAR</option>
                                    <option {{$peserta->status == 'BEKERJA' ? 'selected' : ''}} value="BEKERJA">BEKERJA</option>
                                    <option {{$peserta->status == 'BELUM BEKERJA' ? 'selected' : ''}} value="BELUM BEKERJA">BELUM BEKERJA</option>
                                @else
                                    <option value="MAHASISWA">MAHASISWA</option>
                                    <option value="PELAJAR">PELAJAR</option>
                                    <option value="PELAJAR">BEKERJA</option>
                                    <option value="PELAJAR">BELUM BEKERJA</option>
                                @endif
                                </select>
                            </div>
                        </div>
                    </div>  
                    <input type="hidden" value="{{isset($peserta->id) ? '1' : '0'}}" name="is_edit">
                    <button type="submit" class="btn btn-success notika-btn-success">Submit</button>
                    <a href="{{url()->previous()}}" class="btn btn-danger notika-btn-success">Back</a>
                </div>
            </div>
            </form>
        </div>           
    </div>
</div> 

@endsection