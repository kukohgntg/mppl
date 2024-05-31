@extends('layouts.ui')
@section('judul','Struktur Desa')
@section('php')
<?php
  $sezarah = \App\Webs::get();
    foreach ($sezarah as $sez);


?>
@endsection

@section('content')
    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Sejarah</h3>
                        <p><a href="">Home /</a> Sejarah Desa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

		<div class="container">
            <div class="section-top-border">
				<h3 class="mb-30">Sejarah Desa</h3>
				<div class="row">
					<div class="col-lg-12">
						<blockquote class="generic-blockquote">
							{{ $sez->sejarah }}
						</blockquote>
					</div>
				</div>
			</div>
        </div>
@endsection