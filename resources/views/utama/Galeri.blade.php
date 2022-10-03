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
                        <li class="breadcrumb-item"><a href="{{url('galeri')}}">Galeri</a></li>
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
                <div class="col-12">
                    <!-- Archive Catagory & View Options -->
                    <div class="align-items-center justify-content-between mb-50">
                        <!-- Catagory -->
                        <!-- <div class="archive-catagory">
                            <h4><i class="fa fa-newspaper-o" aria-hidden="true"></i> Berita </h4>
                        </div> -->
                        <div class="section-heading style-2">
                            <h4>Galeri Foto</h4>
                            <div class="line"></div>
                        </div>
                        <!-- View Options -->
                        <!-- <div class="view-options">
                            <a href="archive-grid.html"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            <a href="archive-list.html" class="active"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                        </div> -->
                    </div>
                    <!-- Galeri -->
                    <div class="row">
                        @if(count($foto)>0)
                            @foreach($foto as $key)
                            <!-- Single Blog Post -->
                            <div class="col-12 col-md-3">
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
                        @else
                            <div class="col-12 mb-50"> <div class="alert alert-info"> <p class="no-data"><i class="fa fa-warning"></i> Saat ini kami belum memiliki data untuk ditampilkan.</p> </div></div>
                        @endif
                    </div>
                    <!-- End Galeri -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Archive Catagory & View Options -->
                    <div class="align-items-center justify-content-between mb-50">
                        <!-- Catagory -->
                        <!-- <div class="archive-catagory">
                            <h4><i class="fa fa-newspaper-o" aria-hidden="true"></i> Berita </h4>
                        </div> -->
                        <div class="section-heading style-2">
                            <h4>Galeri Video</h4>
                            <div class="line"></div>
                        </div>
                        <!-- View Options -->
                        <!-- <div class="view-options">
                            <a href="archive-grid.html"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            <a href="archive-list.html" class="active"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                        </div> -->
                    </div>
                    <div class="row">
                        @if(count($video)>0)
                            @foreach($video as $key)
                            <!-- Single Blog Post -->
                            <div class="col-12 col-md-4">
                                <div class="single-post-area mb-30">
                                    <!-- Play Button -->
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        @php
                                            $bg = asset($key->thumbnail);
                                        @endphp
                                        <div class="_video_home single-feature-post video-post bg-img mb-30" style="background-image: url('{{$bg}}');">
                                            <!-- Play Button -->
                                            <a target="_blank" href="{{url('galeridtl')}}/{{$key->id}}" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                        </div>
                                    </div>

                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <!-- <a href="#" class="post-cata cata-sm cata-success">Sports</a> -->
                                        <a target="_blank" href="{{url('galeridtl')}}/{{$key->id}}" class="post-title">{{$key->judul}}</a>
                                        <div class="post-meta d-flex">
                                            <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 22</a> -->
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$key->view}}</a>
                                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{tglindocarbon($key->created_at)}}</a>
                                            <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 15</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="col-12 mb-50"> <div class="alert alert-info"> <p class="no-data"><i class="fa fa-warning"></i> Saat ini kami belum memiliki data untuk ditampilkan.</p> </div></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')

@endsection