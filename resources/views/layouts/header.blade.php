<!-- Start Header Top Area -->
<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="logo-area">
                    <a href="{{url('/')}}">
                        <h3>Sadesha</h3>
                    </a>
                </div>
            </div>
            @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin == '1')
            <div class="col-xs-6" >
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">                           
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-menus"></i></span></a>
                            <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">
                                <div class="hd-mg-tt">
                                    <h2>Profile</h2>
                                </div>                                
                                <div class="hd-message-info">
                                    <a href="{{route('changePasswordForm')}}">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img chat-img">                                                
                                                <i class="notika-icon notika-refresh"></i>
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>Ganti Password</h3>                                                
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{route('logout')}}">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img chat-img">
                                                <i class="notika-icon notika-left-arrow"></i>
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>Logout</h3>                                                
                                            </div>
                                        </div>
                                    </a>                                   
                                </div>                              
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @else
            <div class="col-xs-6">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">                           
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-menus"></i></span></a>
                            <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">
                                <div class="hd-mg-tt">
                                    <h2>Profile</h2>
                                </div>                                
                                <div class="hd-message-info">
                                    <a href="{{route('peserta.changePasswordForm')}}">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img chat-img">                                                
                                                <i class="notika-icon notika-refresh"></i>
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>Ganti Password</h3>                                                
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{route('peserta.logout')}}">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img chat-img">
                                                <i class="notika-icon notika-left-arrow"></i>
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>Logout</h3>                                                
                                            </div>
                                        </div>
                                    </a>                                   
                                </div>                              
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- End Header Top Area -->
<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin == '1')
                                <li>
                                    <a href="{{route('home')}}">Home</a>                               
                                </li>
                                <li>
                                    <a href="{{route('diklat.all')}}">Diklat</a>                               
                                </li>
                                <li>
                                    <a href="{{route('materi.all')}}">Materi</a>                                
                                </li>
                                <li>
                                    <a href="{{route('peserta.all')}}">Peserta</a>
                                </li>
                                <li>
                                    <a href="{{route('peserta.unverified')}}">Calon Peserta</a>
                                </li>
                                <li>
                                    <a href="{{route('faq.all')}}">FAQ</a>
                                </li>
                                @else
                                <li>
                                    <a href="{{route('peserta.profile')}}">Profil</a>
                                </li>
                                <li>
                                    <a href="{{route('peserta.dataDiri')}}">Data Diri</a>
                                </li>
                                <li>
                                    <a href="{{route('peserta.riwayatPendidikan')}}">Riwayat Pendidikan</a>
                                </li>
                                <li>
                                    <a href="{{route('peserta.pengalamanKerja')}}">Pengalaman Kerja</a>
                                </li>
                                <li>
                                    <a href="{{route('peserta.pengalamanOrganisasi')}}">Pengalaman Organisasi</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->
<!-- Main Menu area start-->
<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin == '1')
                        <li>
                            <a href="{{route('home')}}"
                            class="{{Route::currentRouteName() == 'home' ? 'colored' : ''}}">
                            <i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li>
                            <a href="{{route('diklat.all')}}"
                            class="{{Route::currentRouteName() == 'diklat.all' ? 'colored' : ''}}">
                            <i class="notika-icon notika-mail"></i> Diklat</a>
                        </li>
                        <li>
                            <a href="{{route('materi.all')}}"
                            class="{{Route::currentRouteName() == 'materi.all' ? 'colored' : ''}}">
                            <i class="notika-icon notika-edit"></i> Materi</a>
                        </li>
                        <li>
                            <a href="{{route('peserta.all')}}"
                            class="{{Route::currentRouteName() == 'peserta.all' ? 'colored' : ''}}">
                            <i class="notika-icon notika-support"></i> Peserta</a>
                        </li>
                        <li>
                            <a href="{{route('peserta.unverified')}}"
                            class="{{Route::currentRouteName() == 'peserta.unverified' ? 'colored' : ''}}">
                            <i class="notika-icon notika-support"></i> Calon Peserta</a>
                        </li>
                        <li>
                            <a href="{{route('faq.all')}}"
                            class="{{Route::currentRouteName() == 'faq.all' ? 'colored' : ''}}">
                            <i class="notika-icon notika-phone"></i>FAQ</a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('peserta.profile')}}"
                                class="{{Route::currentRouteName() == 'peserta.profile' ? 'colored' : ''}}">
                                <i class="notika-icon notika-support"></i> Profil</a>
                        </li>
                        <li>
                            <a href="{{route('peserta.dataDiri')}}" 
                                class="{{Route::currentRouteName() == 'peserta.dataDiri' ? 'colored' : ''}}">
                                <i class="notika-icon notika-support"></i> 
                                Data Diri</a>
                        </li>
                        <li>
                            <a href="{{route('peserta.riwayatPendidikan')}}"
                                class="{{Route::currentRouteName() == 'peserta.riwayatPendidikan' ? 'colored' : ''}}">
                                <i class="notika-icon notika-edit"></i> 
                                Riwayat Pendidikan</a>
                        </li>
                        <li>
                            <a href="{{route('peserta.pengalamanKerja')}}"
                                class="{{Route::currentRouteName() == 'peserta.pengalamanKerja' ? 'colored' : ''}}">
                                <i class="notika-icon notika-edit"></i> 
                                Pengalaman Kerja</a>
                        </li>
                        <li>
                            <a href="{{route('peserta.pengalamanOrganisasi')}}"
                                class="{{Route::currentRouteName() == 'peserta.pengalamanOrganisasi' ? 'colored' : ''}}">
                                <i class="notika-icon notika-edit"></i> 
                                Pengalaman Organisasi</a>
                        </li>                                         
                    @endif
                </ul>                 
            </div>
        </div>
    </div>
</div>

@if(Route::current()->getName() != 'home')
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
                                    @if(isset($title))
                                        <h2>
                                            {{$title}} 
                                            @if(isset($verified) && $verified)
                                                &nbsp;&nbsp; <button class="btn btn-success">Terverifikasi</button>
                                            @endif
                                            @if(isset($verified) && !$verified)
                                                &nbsp;&nbsp; <button class="btn btn-danger">Belum Terverifikasi</button>
                                            @endif
                                        </h3>                                        
                                    @else
                                        <h2>Data Diklat</h2>     
                                    @endif
                                    @if(isset($breadcrumb))
                                        <p>{{$breadcrumb}}
                                    @else
                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(isset($route))
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="top" title="Print" class="btn"><i class="notika-icon notika-sent"></i></button>
                                <a href="{{$route}}" data-toggle="tooltip" data-placement="top" title="Tambah Data" class="btn"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif