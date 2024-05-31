@extends('layouts.ui')
@section('php')
<?php
    $brita = \App\Brita::orderBy('id','DESC')->paginate('6');
    $structur = \App\Structurdesa::paginate('8');
    $galery = \App\Galery::all();


?>
@endsection

@section('content')
    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Galery</h3>
                        <p><a href="">Home /</a> Galery</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

				<div class="container">
						<div class="section-top-border">
				<h3>Image Gallery</h3>
				<div class="row gallery-item">
					
					@foreach($galery as $ga)
					<div class="col-md-4">
						<a href="{{ asset('foto/'.$ga->foto) }}" class="img-pop-up">
							<div class="single-gallery-image"  style=" background-image: url(<?= asset('foto/'.$ga->foto) ;?>);"></div>
						</a>
					</div>
					<div  style=" background-image: url(<?= asset('foto/'.$ga->foto) ;?>);"></div>
					@endforeach
				</div>
			</div>
				</div>
			
@endsection