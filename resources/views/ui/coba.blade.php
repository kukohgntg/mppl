@extends('layouts.ui')
@section('judul','Peta Wilayah')
@section('php')
<?php
$potensi = \App\Potensi::orderBy('id', 'DESC')->paginate('6');
$structur = \App\Structurdesa::all();
$slider = \App\Slider::all();
$quetes = \App\Quetes::all();



?>
@endsection

@section('content')
<!-- bradcam_area_start  -->
<div class="bradcam_area breadcam_bg bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Peta Wilayah</h3>
                    <p><a href="#">Home /</a> Peta Wilayah</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bradcam_area_end  -->
<br><br><br>
<h3 class="text-center">Peta Wilayah</h3>
<div class="container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15808.694155011919!2d112.51739445!3d-7.8769035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78872e19f2f877%3A0xb7808ff2ef50dab4!2sNgaglik%2C%20Kec.%20Batu%2C%20Kota%20Batu%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1708313335111!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div>
<br><br>


@endsection