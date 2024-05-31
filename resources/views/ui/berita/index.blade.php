@extends('layouts.ui')
@section('php')
<?php
    $structur = \App\Structurdesa::paginate('8');
    $slider = \App\Slider::all();
  $post = \App\Brita::orderBy('id','DESC')->paginate('4');


?>
@endsection

@section('content')

    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>berita</h3>
                        <p><a href="index.html">Home /</a> berita</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->


    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">

                      @foreach($brita as $br)

                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset('foto/'.$br->foto) }}" alt="{{ $br->judul }}"  width="750" >
                                <a href="#" class="blog_item_date">
                                    <h3></h3>
                                    <p>{{ $br->created_at}}</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="/brita/detail/{{ $br->id }}">
                                    <h2>{{ $br->judul }}</h2>
                                </a>
                                  <p><?php
                                $num_char = 100;
                                echo substr($br->keterangan, 0, $num_char) . '.......';
                                  ?></p>
                                <?php 
                                      $isi =  \App\KomentarBrita::all()->where('brita_id',$br->id)->count();
                                ?>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i>{{ $br->penulis }}</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i>{{$isi}}  Comments</a></li>
                                </ul>
                            </div>
                        </article>

                        @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                        {{ $brita->links() }}
                           
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="/pegawai/cari" method="GET">
                            <!-- @csrf -->
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" 
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'"  name="cari" placeholder="Cari Berita .." value="{{ old('cari') }}">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                        </aside>
                  <aside class="single_sidebar_widget popular_post_widget">
                     <h3 class="widget_title">Postingan Terbaru</h3>
                            
                            @foreach($post as $po)
                            <div class="media post_item">
                                <img src="{{ asset('foto/'.$po->foto) }}" width="80" height="80" alt="{{ $po->judul }}">
                                <div class="media-body">
                                <a href="/brita/detail/{{ $po->id }}">
                                    <h3>
                                        <?php
                                            $num_char = 10;
                                            echo substr($po->judul, 0, $num_char) ;
                                        ?>
                                    </h3>
                                </a>
                                <p>{{ $po->created_at }}</p>
                                </div>
                            </div>
                            @endforeach
                        </aside>
                     
                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                <li>
                                    <a href="#">project</a>
                                </li>
                                <li>
                                    <a href="#">love</a>
                                </li>
                                <li>
                                    <a href="#">technology</a>
                                </li>
                                <li>
                                    <a href="#">travel</a>
                                </li>
                                <li>
                                    <a href="#">restaurant</a>
                                </li>
                                <li>
                                    <a href="#">life style</a>
                                </li>
                                <li>
                                    <a href="#">design</a>
                                </li>
                                <li>
                                    <a href="#">illustration</a>
                                </li>
                            </ul>
                        </aside>



                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>

                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Subscribe</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection