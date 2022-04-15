@extends('layouts.app')
@section('content')
<div class="form-example-area" style="margin-top:30px">
    <div class="container">
        <div class="row">
            <form action="{{route('peserta.pengalamanOrganisasi.store')}}" method="post">
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
                            <label>Nama Organisasi</label>
                            <div class="nk-int-st">
                                <input type="text" name="nama_organisasi" class="form-control input-sm" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <div class="nk-int-st">
                                <input type="text" name="jabatan" class="form-control input-sm" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Tahun</label>
                            <div class="nk-int-st">
                                <input type="text" name="tahun" class="form-control input-sm" placeholder="2005" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success notika-btn-success">Submit</button>
                    <a href="{{url()->previous()}}" class="btn btn-danger notika-btn-success">Back</a>
                </div>
            </div>
            </form>
        </div>           
    </div>
</div> 

@endsection