@extends('layouts.Vizew')

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('plugin/slick/slick.css')}}"/>
<!-- Add the new slick-theme.css if you want the default styling -->
<link rel="stylesheet" type="text/css" href="{{asset('plugin/slick/slick-theme.css')}}"/>
@endsection

@section('content')
<section class="slider-area">
    <div class="single-slider d-none d-lg-block d-md-block">
        @foreach($slider as $data)
        <div><img src="{{asset($data->foto)}}" alt="" class="_img"></div>
        @endforeach
    </div>
    <div class="single-slider d-block d-lg-none d-md-none">
        @foreach($slider as $data)
        <div><img src="{{asset($data->foto_m)}}" alt="" class="_img"></div>
        @endforeach
    </div>
</section>


    <!-- ##### Trending Posts Area Start ##### -->
    <section class="trending-posts-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h4>Tentang Kami</h4>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row mb-80">
                <!-- Single Blog Post -->
                <div class="col-12 col-md-12">
                    {{$template->tentang_kami_home}}
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Trending Posts Area End ##### -->

    <!-- ##### Vizew Post Area Start ##### -->
    <section class="vizew-post-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="all-posts-area mb-80">
                     

                        <!-- Section Heading -->
                        <div class="section-heading style-2">
                            <h4>Berita Terkini</h4>
                            <div class="line"></div>
                        </div>
                        @if(count($berita) > 0) 
                        <!-- Featured Post Slides -->
                        <div class="featured-post-slides owl-carousel mb-30">

                            @foreach($berita as $key)
                            <!-- Single Feature Post -->
                            @php
                                $bg = asset($key->foto);
                            @endphp
                            <div class="single-feature-post video-post bg-img" style="background-image: url('{{$bg}}');">
                                <!-- Play Button -->
                                <!-- <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a> -->

                                <!-- Post Content -->
                                <div class="post-content">
                                    <!-- <a href="#" class="post-cata">Sports</a> -->
                                    <a target="_blank" href="{{url('informasidtl/berita')}}/{{$key->id}}" class="post-title">{{$key->judul}}</a>
                                    <div class="post-meta d-flex">
                                        <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a> -->
                                        <a><i class="fa fa-eye" aria-hidden="true"></i> {{$key->view}}</a>
                                        <a><i class="fa fa-calendar" aria-hidden="true"></i> {{tglindocarbon($key->created_at)}}</a>
                                        <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a> -->
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <!-- <span class="video-duration">5 Agustus 2022</span> -->
                            </div>
                            @endforeach
                        </div>

                        @foreach($berita as $key)
                        <!-- Single Post Area -->
                        <div class="single-post-area mb-30">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="{{asset($key->foto)}}" alt="">

                                        <!-- Video Duration -->
                                        <!-- <span class="video-duration">5 Agustus 2022</span> -->
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <!-- Post Content -->
                                    <div class="post-content mt-0">
                                        <!-- <a href="#" class="post-cata cata-sm cata-success">Sports</a> -->
                                        <a target="_blank" href="{{url('informasidtl/berita')}}/{{$key->id}}" class="post-title mb-2">{{$key->judul}}</a>
                                        <div class="post-meta d-flex align-items-center mb-2">
                                            <a href="#" class="post-author">{{$key->created_r->name}}</a>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <a href="#" class="post-date">{{tglindocarbon($key->created_at)}}</a>
                                        </div>
                                        <p class="mb-2">{{$key->ringkasan}}</p>
                                        <div class="post-meta d-flex">
                                            <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 32</a> -->
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$key->view}}</a>
                                            <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 7</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="post-content _center">
                            <a href="{{url('informasi/berita')}}" class="post-cata cata-md cata-default">Lihat Berita Lainnya</a>
                        </div>

                        @else
                            <p class="no-data">Belum Ada Data</p>
                        @endif

                    </div>

                    <!-- Galeri -->
                    <div class="align-items-center justify-content-between">
                        <!-- Catagory -->
                        <!-- <div class="archive-catagory">
                            <h4>Galeri</h4>
                        </div> -->
                        <div class="section-heading style-2">
                            <h4>Galeri</h4>
                            <div class="line"></div>
                        </div>
                        <!-- View Options -->
                        <!-- <div class="view-options">
                            <a href="archive-grid.html" class="active"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            <a href="archive-list.html"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                        </div> -->
                    </div>

                    <div class="row">
                        @if(count($foto) > 0) 

                        @foreach($foto as $key)
                        <!-- Single Blog Post -->
                        <div class="col-12 col-md-6">
                            <div class="single-post-area mb-50">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <a target="_blank" href="{{asset($key->foto)}}"><img src="{{asset($key->foto)}}" alt=""></a>

                                    <!-- Video Duration -->
                                    <!-- <span class="video-duration">05.03</span> -->
                                </div>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <!-- <a href="#" class="post-cata cata-sm cata-success">Sports</a> -->
                                    <a target="_blank" href="{{asset($key->foto)}}" class="post-title">{{$key->judul}}</a>
                                    <!-- <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 22</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 16</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 15</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="post-content _center">
                            <a href="{{url('galeri')}}" class="post-cata cata-md cata-default">Lihat Galeri Lainnya</a>
                        </div>

                        @else
                        <div class="post-content _center">
                            <p class="no-data">Belum Ada Data</p>
                        </div>
                        @endif
                    </div>
                    <!-- End Galeri -->
                </div>

                <div class="col-12 col-md-5 col-lg-4">
                    <div class="sidebar-area">

                        <!-- ***** Single Widget ***** -->
                        <!-- <div class="single-widget followers-widget mb-50">
                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span class="counter">198</span><span>Fan</span></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span class="counter">220</span><span>Followers</span></a>
                            <a href="#" class="google"><i class="fa fa-google" aria-hidden="true"></i><span class="counter">140</span><span>Subscribe</span></a>
                        </div> -->

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Pengumuman</h4>
                                <div class="line"></div>
                            </div>
                            @if(count($pengumuman) > 0) 

                            @foreach($pengumuman as $key)
                        
                            <!-- Single Blog Post -->
                            <div class="single-blog-post d-flex">
                                <!-- <div class="post-thumbnail">
                                    <img src="{{asset('layout/vizew/img/bg-img/1.jpg')}}" alt="">
                                </div> -->
                                <div class="post-content _post_content_home">
                                    <a target="_blank" href="{{url('informasidtl/pengumuman')}}/{{$key->id}}" class="post-title">{{$key->judul}}</a>
                                    <div class="post-meta d-flex justify-content-between">
                                        <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a> -->
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$key->view}}</a>
                                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{tglindocarbon($key->created_at)}}</a>
                                        <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a> -->
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="post-content _center">
                                <a href="{{url('informasi/pengumuman')}}" class="post-cata cata-md cata-default">Lihat Pengumuman Lainnya</a>
                            </div>
                            @else
                            <div class="post-content _center">
                                <p class="no-data">Belum Ada Data</p>
                            </div>
                            @endif

                        </div>

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget add-widget mb-50">
                            <a target="_blank" href="{{$template->link_iklan}}"><img src="{{asset($template->iklan)}}" alt=""></a>
                        </div>
                        
                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget latest-video-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Agenda Kegiatan</h4>
                                <div class="line"></div>
                            </div>

                            @if(count($agenda) > 0) 

                            <!-- Single Blog Post -->
                            <div class="single-post-area mb-30">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="{{asset($agenda[0]->foto)}}" alt="">

                                    <!-- Video Duration -->
                                    <!-- <span class="video-duration">5 Agustus 2022</span> -->
                                </div>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <!-- <a href="#" class="post-cata cata-sm cata-success">Sports</a> -->
                                    <a target="_blank" href="{{url('informasidtl/agenda')}}/{{$agenda[0]->id}}" class="post-title">{{$agenda[0]->judul}}</a>
                                    <div class="post-meta d-flex">
                                        <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a> -->
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$agenda[0]->view}}</a>
                                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{tglindocarbon($agenda[0]->created_at)}}</a>
                                        <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a> -->
                                    </div>
                                </div>
                            </div>

                            @foreach($agenda as $key)
                            <!-- Single Blog Post -->
                            <div class="single-blog-post d-flex">
                                <div class="post-thumbnail">
                                    <img src="{{asset($key->foto)}}" alt="">
                                </div>
                                <div class="post-content">
                                    <a target="_blank" href="{{url('informasidtl/agenda')}}/{{$key->id}}" class="post-title">{{$key->judul}}</a>
                                    <div class="post-meta d-flex justify-content-between">
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$key->viewer}}</a>
                                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{tglindocarbonsingkat($key->created_at)}}</a>
                                        <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 23</a> -->
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="post-content _center">
                                <a href="{{url('informasi/agenda')}}" class="post-cata cata-md cata-default">Lihat Agenda Lainnya</a>
                            </div>
                            @else
                            <div class="post-content _center">
                                <p class="no-data">Belum Ada Data</p>
                            </div>
                            @endif
                        </div>

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget newsletter-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2">
                                <h4>Struktur Organisasi</h4>
                                <div class="line"></div>
                            </div>
                            @if(count($struktur) > 0) 
                            <!-- Sports Video Slides -->
                            <div class="sport-video-slides owl-carousel mb-30">
                                @foreach($struktur as $key)
                                @php
                                    $bg = asset($key->foto);
                                @endphp
                                <div class="_struktur_home single-feature-post video-post bg-img" style="background-image: url('{{$bg}}');">
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="{{url('perangkatdesa')}}" class="post-cata">{{$key->jabatan}}</a>
                                        <a href="{{url('perangkatdesa')}}" class="post-title">{{$key->nama_pejabat}}</a>
                                        <!-- <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 25</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>
                                        </div> -->
                                    </div>

                                    <!-- Video Duration -->
                                    <!-- <span class="video-duration">05.03</span> -->
                                </div>
                                @endforeach
                            </div>
                            <div class="post-content _center">
                                <a href="{{url('perangkatdesa')}}" class="post-cata cata-md cata-default">Lihat Semua</a>
                            </div>
                            @else
                            <div class="post-content _center">
                                <p class="no-data">Belum Ada Data</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="_footer mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    {!!$template->maps!!}
                </div>
                @if(1==2)
                <div class="col-12 col-md-5 col-lg-4">
                <table class="table table-borderless table-sm">
                    <tbody>
                    @for($i=1 ; $i<=7 ; $i++)
                    <tr>
                        <td class="font-weight-bold">Batas Sebelah Utara</td>
                        <td>: BERONDONG, PASEKAN</td>
                    </tr>
                    @endfor
                    </tbody>
                </table>
                </div>
                @endif
            </div>
        </div>
    </section>
    @if(1==2)
    <section class="trending-posts-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h4>Video Terpopuler</h4>
                        <div class="line"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                @for($i=1 ; $i<=3 ; $i++)
                <!-- Single Blog Post -->
                <div class="col-12 col-md-4">
                    <div class="single-post-area mb-30">
                         <!-- Play Button -->
                         <!-- Post Thumbnail -->
                         <div class="post-thumbnail">
                            @php
                                $bg = asset('layout/vizew/img/bg-img/14.jpg');
                            @endphp
                            <div class="_video_home single-feature-post video-post bg-img mb-30" style="background-image: url('{{$bg}}');">
                                <!-- Play Button -->
                                <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                                <!-- Post Content -->
                                <!-- <div class="post-content">
                                    <a href="#" class="post-cata">Sports</a>
                                    <a href="single-post.html" class="post-title">Reunification of migrant toddlers, parents should be completed Thursday</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>
                                    </div>
                                </div> -->

                                <!-- Video Duration -->
                                <!-- <span class="video-duration">05.03</span> -->
                            </div>
                        </div>

                        <!-- Post Content -->
                        <div class="post-content">
                            <!-- <a href="#" class="post-cata cata-sm cata-success">Sports</a> -->
                            <a href="single-post.html" class="post-title">Warner Bros. Developing ‘The accountant’ Sequel</a>
                            <div class="post-meta d-flex">
                                <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 22</a> -->
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 16</a>
                                <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 21 Agustus 2022</a>
                                <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 15</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
                <div class="post-content _center">
                    <a href="#" class="post-cata cata-md cata-default mb-80">Lihat Video Lainnya</a>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection

@section('footer')
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{asset('plugin/slick/slick.min.js')}}"></script>
<script>
   $(document).ready(function(){
        // $('.single-slider').slick();
        $('.single-slider').slick({
            slidesToScroll: 1,
            infinite: true,
            fade: true,
            autoplay: true,
            autoplaySpeed: 2000
        });
   });
</script>
@endsection