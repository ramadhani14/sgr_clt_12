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
                        <li class="breadcrumb-item active" aria-current="page">{{$data->judul}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<section class="post-details-area mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8 col-xl-8 mb-30">
                    <img src="{{asset($data->foto)}}" alt="" class="mb-30" width="100%">

                    <div class="post-details-content">
                        <!-- Blog Content -->
                        <div class="blog-content">

                            <!-- Post Content -->
                            <div class="post-content mt-0">
                                <!-- <a href="#" class="post-cata cata-sm cata-danger">Game</a> -->
                                <a href="#" class="post-title mb-2 title-single">{{$data->judul}}</a>

                                <div class="d-flex justify-content-between mb-30">
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-author">{{$data->created_r->name}}</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date">{{tglindocarbon($data->created_at)}}</a>
                                    </div>
                                    <div class="post-meta d-flex">
                                        <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 32</a> -->
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$data->view}}</a>
                                        <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 7</a> -->
                                    </div>
                                </div>
                            </div>
                            {!!$data->ket!!}
                        </div>
                    </div>      
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-md-5 col-lg-4 col-xl-4">
                    <div class="sidebar-area">
                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget latest-video-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Berita Lainnya</h4>
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
                            <a href="https://www.youtube.com/" target="_blank"><img src="{{asset($template->iklan)}}" alt=""></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')

@endsection