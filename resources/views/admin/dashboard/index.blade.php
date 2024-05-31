@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
	<div class="col-lg-3">
		<div class="card border border-success">
			<div class="card-body text-success">
				<h2 class="card-title text-success text-center" > <i class="icon-user"></i></h2>
				<h5 class="card-title text-success text-center">User</h5>
				<h3 class="card-text text-success text-center ">{{ $users }}</h3>
			</div>
		</div> 
	</div>
	
	<div class="col-lg-3">
		<div class="card border border-success">
			<div class="card-body text-success">
				<h2 class="card-title text-success text-center" > <i class=" icon-speech"></i></h2>
				<h5 class="card-title text-success text-center">Berita</h5>
				<h3 class="card-text text-success text-center ">{{ $berita }}</h3>
			</div>
		</div> 
	</div>
	<div class="col-lg-3">
		<div class="card border border-success">
			<div class="card-body text-success">
				<h2 class="card-title text-success text-center" > <i class=" icon-event"></i></h2>
				<h5 class="card-title text-success text-center">Potensi</h5>
				<h3 class="card-text text-success text-center ">{{ $potensi }}</h3>
			</div>
		</div> 
	</div>
	<div class="col-lg-3">
		<div class="card border border-success">
			<div class="card-body text-success">
				<h2 class="card-title text-success text-center" > <i class=" icon-picture"></i></h2>
				<h5 class="card-title text-success text-center">Galery</h5>
				<h3 class="card-text text-success text-center ">{{ $galery }}</h3>
			</div>
		</div> 
	</div>
	
	</div>
</div>
@endsection