@extends('layouts.ui')
@section('php')
<?php
$potensi = \App\Potensi::orderBy('id', 'DESC')->paginate('6');
$structur = \App\Structurdesa::all();
$slider = \App\Slider::all();
$quetes = \App\Quetes::all();
$webs = \App\Webs::get();
foreach ($webs as $xas);


?>
@endsection
@section('judul','Ngaglik.com')
@section('content')


<!-- slider_area_start -->
<div class="slider_area">
    <div class="slider_active owl-carousel">

        @foreach($slider as $sl)
        <div class="single_slider  d-flex align-items-center " style=" background-image: url(<?= asset('foto/' . $sl->foto); ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_text ">
                            <h3 style=" color: <?= $sl->color; ?>; "> <span>{{ $sl->heding }}</span> <br>
                                {{$sl->heding2}}
                            </h3>
                            <p>{{ $sl->keterangan}}</p>
                            <a href="{{ url('/peta') }}" class="boxed-btn3">Ngaglik</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
<!-- slider_area_end -->

<!-- service_area_start -->
<div class="service_area">
    <div class="container p-0">
        <div class="row no-gutters">
            <div class="col-xl-4 col-md-4">
                <div class="single_service">
                    <h3>Perumahan</h3>
                    <p>Mempunyai perumahan yang banyak memiliki tempat yang strategis dekat kota</p>
                    <a href="#" class="boxed-btn3-white">Selengkapnya</a>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_service" style="height:100%;">
                    <h3>Seni Budaya</h3>
                    <p>Mempunyai banyak macam macam seni pagelaran seni dan masih banyak lainya</p>
                    <a href="#" class="boxed-btn3-white">{{ $xas->tlp }}</a>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_service">
                    <h3>Potensi</h3>
                    <p>Mempunyai Banyak Potensi yang Cukup banyak seperti perumahan pertokan dll.</p><br>
                    <a href="{{ url('/potensi') }}" class="boxed-btn3-white">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service_area_end -->

<!-- welcome_docmed_area_start -->
<div class="welcome_docmed_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="welcome_thumb">
                    <div class="thumb_1">
                        <img src="{{ asset('foto/reog2.jpg')}}" width="362" height="440">
                    </div>
                    <div class="thumb_2">
                        <img src="{{ asset('foto/reog1.jpg')}}" width="362" height="440">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="welcome_docmed_info">
                    <h2>Welcome to Website</h2>
                    <h3>Pelayanan Yang Baik <br>
                        Untuk Anda</h3>
                    <p>Menuju Ngaglik yang berbudaya dan religius</p>
                    <ul>
                        <li> <i class="flaticon-right"></i>Menuju Ngaglik Yang Bersih</li>
                        <li> <i class="flaticon-right"></i>Menuju Ngaglik Yang Damai</li>
                        <li> <i class="flaticon-right"></i>Menuju Ngaglik Yang Makmur </li>
                    </ul>
                    <a href="#" class="boxed-btn3-white-2">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- welcome_docmed_area_end -->

<!-- offers_area_start -->
<div class="our_department_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-55">
                    <h3>Potensi</h3>
                    <p>Potensi potensi Ngaglik<br>
                        Sangat lah banyak seperti berikut ini </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($potensi as $br)
            <div class="col-xl-4 col-md-6 col-lg-4">
                <div class="single_department">
                    <div class="department_thumb">
                        <img src="{{ asset('foto/'.$br->foto) }}" width="362" height="240" alt="">
                    </div>
                    <div class="department_content">
                        <h3><a href="/potensi/detail/{{ $br->id }}">{{ $br->nama_potensi }}</a></h3>
                        <p><?php
                            $num_char = 40;
                            echo substr($br->keterangan, 0, $num_char) . '.......';
                            ?></p>
                        <a href="/potensi/detail/{{ $br->id }}" class="learn_more">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- offers_area_end -->

<!-- testmonial_area_start -->
<div class="testmonial_area">
    <div class="testmonial_active owl-carousel">
        @foreach($quetes as $qu)
        <div class="single-testmonial  overlay2" style=" background-image: url(<?= asset('foto/' . $qu->foto); ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="testmonial_info text-center">
                            <div class="quote">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                            <p> {{ $qu->keterangan }}</p>
                            <div class="testmonial_author">
                                <h4>{{ $qu->penulis }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- testmonial_area_end -->



<!-- expert_doctors_area_start -->
<div class="expert_doctors_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="doctors_title mb-55">
                    <h3>Struktur desa</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="expert_active owl-carousel">
                    @foreach($structur as $st)
                    <div class="single_expert">
                        <div class="expert_thumb">
                            <img src="{{ asset('foto/'.$st->foto) }}" alt="{{ $st->nama}}" width="265" height="250">
                        </div>
                        <div class="experts_name text-center">
                            <h3>{{ $st->nama}}</h3>
                            <span>{{ $st->jabatan }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- expert_doctors_area_end -->


@endsection