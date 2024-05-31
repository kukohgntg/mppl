@extends('layouts.ui')
@section('judul','visi-misi')
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
				<h3 class="mb-30">Visi-misi Desa</h3>
				<div class="row">
					<div class="col-lg-12">
						<blockquote class="generic-blockquote">
                            <h4>“NGAGLIK BERBENAH MENUJU NGAGLIK YANG LEBIH MAJU, BERBUDAYA DAN RELIGIUS”</h4>
                            <P>- Terbentuknya budaya keteladanan pemimpin yang efektif, guna mengembangkan manajemen pemerintahan daerah yang amanah,tanggap dan berkemampuan andal memecahkan masalah rakyat.</P>
                            <P>- Terkelolanya seluruh sumber daya daerah menjadi lebih berdayaguna, unggul, produktif, berkelanjutan, serta bermanfaat luas secara ekonomi dan sosial.</P>
                            <P>- Terwujudnya pengelolaan infrastruktur strategis secara profesional, agar memiliki daya dukung yang kokoh untuk menyokong produktivitas masyarakat, kemajuan wilayah, serta peningkatan kesejahteraan umum.</P>
                            <P>- Terbangunnya sistem pertanian modern, sebagai basis pengembangan model ekonomi kerakyatan yang berdaya saing tangguh, memicu investasi dan industry, serta berperan menjadi lokomotif penggerak perekonomian daerah.</P>
                            <P>- Penataan kawasan yang nyaman untuk semua, dengan ketersediaan ruang publik yang memadai, berwawasan kelestarian lingkungan, sekaligus upaya mempercepat
pengurangan ketimpangan antara wilayah pedesaan dengan perkotaan.</P>
                            <P>- Terbangunnya prinsip kemandirian dalam upaya pemberdayaan masyarakat miskin, pengangguran, serta perluasan kesempatan kerja.</P>
                            <P>- Meningkatnya peran aktif Pemerintah Daerah dalam memajukan sistem pelayanan pendidikan dan kesehatan masyarakat, guna mendorong kualitas Sumber Daya Manusia (SDM) yang hebat dan bertaqwa.</P>
						</blockquote>
					</div>
				</div>
			</div>
        </div>
@endsection