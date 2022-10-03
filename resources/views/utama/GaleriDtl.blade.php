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
                        <li class="breadcrumb-item"><a href="{{url('berita')}}">Galeri</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$video->judul}}</li>
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
                    <div class="single-video-area">
                        {!!$video->link!!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="post-details-content d-flex">
                        <!-- Post Share Info -->
                        <div class="post-share-info">
                            <p style="color:#0088cc">Share</p>
                            <a data-toggle="tooltip" title="Share ke WhatsApp" target="_blank" href="https://api.whatsapp.com/send?text={{URL::current()}}" data-action="share/whatsapp/share" class="whatsapp sosmed-custom"><i class="fa fa-whatsapp"></i></a>
                            <!-- <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="thumb-tack"><i class="fa fa-thumb-tack"></i></a> -->
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">

                            <!-- Post Content -->
                            <div class="post-content mt-0">
                                <!-- <a href="#" class="post-cata cata-sm cata-danger">Game</a> -->
                                <a href="#" class="post-title mb-2 title-single">{{$video->judul}}</a>

                                <div class="d-flex justify-content-between mb-30">
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-author">{{$video->created_r->name}}</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date">{{tglindocarbon($video->created_at)}}</a>
                                    </div>
                                    <div class="post-meta d-flex">
                                        <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 32</a> -->
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$video->view}}</a>
                                        <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 7</a> -->
                                    </div>
                                </div>
                            </div>

                            {!!$video->ket!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')

@endsection