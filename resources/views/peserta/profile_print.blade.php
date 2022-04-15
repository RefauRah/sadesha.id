<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
        body{
            font-family: sans-serif;
            color:#444;
            text-align:left;
            font-size:12px;
            margin:0;
        }
        .container{
            margin: 0 auto;
            margin-top: 30px;
            width: 80%;
            overflow: hidden;
            min-height: 1000px !important;
        }
        h3{
            text-align: center;
            margin-top: 30px;
            margin-bottom: 15px;
        }
        table{
            border-collapse: collapse;
            width: 60%;
            float: left;
        }
        table th, table td{
            text-align: left;
            padding: 10px;
            font-size: 12px;
        }
        tr{
            border-bottom: 1px solid #ddd;
        }
        #data-diri th{
            width: 40%;
            text-align: left;
        }
        #qr-code{
            width: 50%;
            float: right;
        }
        #data-diri td{width: 60%}
        .divider{
            border-top: 1px solid #eee;
            border-width: .3;
            margin: 10px 0;
        }
        .other th:first-child{
            width: 40%;
        }
        .other th:nth-child(2){
            width: 30%;
        }
        .other th:nth-child(3){
            width: 30%;
        }
        .other tr:nth-child(odd){
            background: #eee;
        }
        #qr-code img{
            height: 300px !important;
            width: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Data Diri</h3>
        <table id="data-diri">
            <tr>
                <th>Tipe Peserta</th>
                <td>{{$peserta->tipe_peserta}}</td>         
            </tr>
            <tr>
                <th>No Peserta</th>
                <td>{{$peserta->no_peserta}}</td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td>{{$peserta->nama_peserta}}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{$peserta->tgl_lahir}}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{$peserta->jenis_kelamin}}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{$peserta->status}}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{$peserta->alamat}}</td>
            </tr>
            <tr>
                <th>Nomor HP</th>
                <td>{{$peserta->no_hp}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$peserta->email}}</td>
            </tr>
        </table>
        <div id="#qr-code">
            @if($peserta != null && $peserta->is_verified == '1')
            <img src="{{$qrCode}}">
            @endif
        </div>

        <div style="clear:both"></div>
        <h3>Riwayat Pendidikan</h3>
        <table style="width: 100%" class="other" id="pendidikan">
            <tr>
                <th>Nama Instansi</th>
                <th>Tahun Masuk</th>
                <th>Tahun Lulus</th>
            </tr>
            @foreach($pendidikan  as $p)
            <tr>
                <td>{{$p->nama_instansi}}</td>
                <td>{{$p->tahun_masuk}}</td>
                <td>{{$p->tahun_lulus}}</td>
            </tr>
            @endforeach
        </table>


        <h3>Pengalaman Organisasi</h3>
        <table style="width: 100%" class="other" id="organisasi">
            <tr>
                <th>Nama Organisasi</th>
                <th>Jabatan</th>
                <th>Tahun</th>
            </tr>
            @foreach($organisasi  as $o)
            <tr>
                <td>{{$o->nama_organisasi}}</td>
                <td>{{$o->jabatan}}</td>
                <td>{{$o->tahun}}</td>
            </tr>
            @endforeach
        </table>


        <h3>Pengalaman Bekerja</h3>
        <table style="width: 100%" class="other" id="kerja">
            <tr>
                <th>Nama Instansi</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
            </tr>
            @foreach($pekerjaan as $pk)
            <tr>
                <td>{{$pk->nama_instansi}}</td>
                <td>{{$pk->tgl_mulai}}</td>
                <td>{{$pk->tgl_selesai}}</td>
            </tr>
            @endforeach
        </table>
        
    </div>
</body>
</html>
