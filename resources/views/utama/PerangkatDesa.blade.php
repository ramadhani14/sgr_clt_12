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
                        <li class="breadcrumb-item"><a href="{{url('perangkatdesa')}}">Perangkat Desa</a></li>
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
                @if(count($perangkat)>0)
                    @foreach($perangkat as $key)
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="sidebar-area content-perangkat">
                            <!-- ***** Single Widget ***** -->
                            @php
                                $bg = asset($key->foto);
                            @endphp
                            <div class="_struktur_home single-feature-post video-post bg-img" style="background-image: url('{{$bg}}');">
                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata">{{$key->jabatan}}</a>
                                    <a href="#" class="post-title">{{$key->nama_pejabat}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12"> <div class="alert alert-info"> <p class="no-data"><i class="fa fa-warning"></i> Saat ini kami belum memiliki data untuk ditampilkan.</p> </div></div>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('footer')

@endsection