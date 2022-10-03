@extends('layouts.Vizew')

@section('header')

@endsection

@section('content')
<div class="vizew-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{url('informasi/'.$submenu)}}">{{$header}}</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Reunification of migrant toddlers</li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<section class="post-details-area mb-80">
        <div class="container">
            <div class="row">
                @if(count($data)>0)
                <div class="col-12 col-lg-8">
                    <!-- Archive Catagory & View Options -->
                    <div class="align-items-center justify-content-between mb-50">
                        <!-- Catagory -->
                        <!-- <div class="archive-catagory">
                            <h4><i class="fa fa-newspaper-o" aria-hidden="true"></i> Berita </h4>
                        </div> -->
                        <div class="section-heading style-2">
                            <h4>{{$header}}</h4>
                            <div class="line"></div>
                        </div>
                        <!-- View Options -->
                        <!-- <div class="view-options">
                            <a href="archive-grid.html"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            <a href="archive-list.html" class="active"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                        </div> -->
                    </div>
            
                    @foreach($data as $key)
                    <!-- Single Post Area -->
                    <div class="single-post-area style-2 berita-s">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="{{asset($key->foto)}}" alt="">

                                    <!-- Video Duration -->
                                    <!-- <span class="video-duration">05.03</span> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Post Content -->
                                <div class="post-content mt-0">
                                    <!-- <a href="#" class="post-cata cata-sm cata-success">Sports</a> -->
                                    <a data-toggle="tooltip" title="Lihat Selengkapnya" href="{{url('informasidtl/'.$submenu)}}/{{$key->id}}" class="post-title mb-2">{{$key->judul}}</a>
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

                    <!-- Pagination -->
                    <div class="mt-50 _center_links">
                        <!-- <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul> -->
                        {{ $data->links() }}
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="sidebar-area">

                        <!-- ***** Single Widget ***** -->
                        <!-- <div class="single-widget followers-widget mb-50">
                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span class="counter">198</span><span>Fan</span></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span class="counter">220</span><span>Followers</span></a>
                            <a href="#" class="google"><i class="fa fa-google" aria-hidden="true"></i><span class="counter">140</span><span>Subscribe</span></a>
                        </div> -->

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget latest-video-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>{{$header}} Terbaru</h4>
                                <div class="line"></div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="single-post-area mb-30">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="{{asset($dataterbaru[0]->foto)}}" alt="">

                                    <!-- Video Duration -->
                                    <!-- <span class="video-duration">05.03</span> -->
                                </div>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <!-- <a href="#" class="post-cata cata-sm cata-success">Sports</a> -->
                                    <a href="{{url('informasidtl/'.$submenu)}}/{{$dataterbaru[0]->id}}" class="post-title">{{$dataterbaru[0]->judul}}</a>
                                    <div class="post-meta d-flex">
                                        <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a> -->
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$dataterbaru[0]->view}}</a>
                                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{tglindocarbon($dataterbaru[0]->created_at)}}</a>
                                        <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a> -->
                                    </div>
                                </div>
                            </div>
                            @foreach($dataterbaru as $key)
                            <!-- Single Blog Post -->
                            <div class="single-blog-post d-flex">
                                <div class="post-thumbnail">
                                    <img src="{{asset($key->foto)}}" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="{{url('informasidtl/'.$submenu)}}/{{$key->id}}" class="post-title">{{$key->judul}}</a>
                                    <div class="post-meta d-flex justify-content-between">
                                        <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 29</a> -->
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$key->view}}</a>
                                         <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{tglindocarbonsingkat($key->created_at)}}</a>
                                        <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 23</a> -->
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="post-content _center">
                                <a href="{{url('informasi/'.$submenu)}}" class="post-cata cata-md cata-default">Lihat Semua</a>
                            </div>
                        </div>

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget add-widget mb-50">
                            <a target="_blank" href="{{$template->link_iklan}}"><img src="{{asset($template->iklan)}}" alt=""></a>
                        </div>

                    </div>
                </div>
                @else
                <div class="col-12"> <div class="alert alert-info"> <p class="no-data"><i class="fa fa-warning"></i> Saat ini kami belum memiliki data untuk ditampilkan.</p> </div></div>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('footer')

@endsection