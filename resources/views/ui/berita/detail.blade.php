@extends('layouts.ui')
@section('judul',$brita->judul)
@section('php')

<?php
  $komen =  \App\KomentarBrita::all()->where('brita_id',$brita->id);
  $isi =  \App\KomentarBrita::all()->where('brita_id',$brita->id)->count();
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
                      <h3>Blog detials</h3>
                      <p><a href="index.html">Home /</a> Blog detials</p>
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
                     <img class="img-fluid" src="{{ asset('foto/'.$brita->foto) }}" alt="{{ $brita->judul }}" width="750" height="375">
                  </div>
                  <div class="blog_details">
                     <h2> {{ $brita->judul }} </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-user"></i>{{ $brita->penulis }}</a></li>
                        <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                     </ul>
                     <p class="excert">
                       {{$brita->keterangan}}
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

               <div class="comments-area">
                  <h4>{{ $isi }} Comments</h4>

                  @foreach($komen as $k)
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              
                           </div>
                           <div class="desc">
                              <p class="comment">
                                {{ $k->komentar }}
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#">{{ $k->name }}</a>
                                    </h5>
                                    <p class="date">{{$k->waktu}} </p>
                                 </div>
                                 <div class="reply-btn">
                                    <!-- <a href="#" class="btn-reply text-uppercase">reply</a> -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
               <div class="comment-form">
                  <h4>Leave a Reply</h4>
                  <form class="form-contact comment_form" action="{{ url('/brita/komentar') }}" method="post" id="commentForm">
                      {{ csrf_field() }}
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                 placeholder="Write Comment" required ></textarea>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" required  name="name" id="name" type="text" placeholder="Name">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" required name="email" id="email" type="email" placeholder="Email">
                           </div>
                        </div>
                     </div>
                    <input type="hidden" name="id" value="{{ $brita->id }}">
                     <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                     </div>
                     
                  </form>
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