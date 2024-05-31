@extends('layouts.ui')
@section('judul',$potensi->nama_potensi)
@section('php')

<?php

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
                      <h3>Potensi detials</h3>
                      <p><a href="index.html">Home /</a> Potensi detials</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- bradcam_area_end  -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="{{ asset('foto/'.$potensi->foto) }}" alt="{{ $potensi->nama_potensi }}" width="750" height="375">
                  </div>
                  <div class="blog_details">
                     <h2> {{ $potensi->nama_potensi }} </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-user"></i>{{ $potensi->alamat }}</a></li>
                     </ul>
                     <p class="excert">
                       {{$potensi->keterangan}}
                     </p>
             
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                     </ul>
                  </div>
           
               </div>

           
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
               

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
   <!--================ Blog Area end =================-->


@endsection