@extends('layouts.ui')
@section('judul','Struktur Desa')
@section('php')
<?php
    $potensi = \App\Potensi::orderBy('id','DESC')->paginate('6');
    $structur = \App\Structurdesa::all();
    $slider = \App\Slider::all();
    $quetes = \App\Quetes::all();



?>
@endsection

@section('content')
    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Struktur</h3>
                        <p><a href="index.html">Home /</a> Struktur</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- expert_doctors_area_start -->
    <div class="expert_doctors_area doctor_page">
        <div class="container">
            <div class="row">
                @foreach($structur as $st)

                <div class="col-md-6 col-lg-3">
                    <div class="single_expert mb-40">
                        <div class="expert_thumb">
                           <img src="{{ asset('foto/'.$st->foto) }}" alt="{{ $st->nama}}" width="265" height="250">
                        </div>
                        <div class="experts_name text-center">
                         <h3>{{ $st->nama}}</h3>
                        <span>{{ $st->jabatan }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
          

            </div>
        </div>
    </div>


    <!-- testmonial_area_start -->
    <div class="testmonial_area">
        <div class="testmonial_active owl-carousel">
            @foreach($quetes as $qu)
            <div class="single-testmonial  overlay2" style=" background-image: url(<?= asset('foto/'.$qu->foto) ;?>);">
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


@endsection