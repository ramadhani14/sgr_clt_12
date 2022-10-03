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
                        <li class="breadcrumb-item"><a href="{{url('struktur')}}">Struktur Organisasi</a></li>
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
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="sidebar-area">
                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget mb-50">
                            <!-- Section Heading -->
                            <div class="post-content _center">
                                <a href="{{url('struktur')}}" class="post-cata cata-md cata-default btn-s-active">Struktur Organisasi</a>
                            </div>
                            @foreach($struktur as $key)
                            <div class="post-content _center">
                                <a href="{{url('strukturdtl')}}/{{$key->id}}" class="post-cata cata-md cata-default btn-s">{{$key->jabatan}}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if($template->struktur)
                <div class="col-12 col-md-8 col-lg-9">
                    {!!$template->struktur!!}
                </div>
                @else
                <div class="col-12 col-md-8 col-lg-9"> <div class="alert alert-info"> <p class="no-data"><i class="fa fa-warning"></i> Saat ini kami belum memiliki data untuk ditampilkan.</p> </div></div>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('footer')

@endsection