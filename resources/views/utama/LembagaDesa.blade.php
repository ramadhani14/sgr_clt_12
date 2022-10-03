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
                        <li class="breadcrumb-item"><a href="{{url('lembagadesa')}}">Lembaga Desa</a></li>
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
                @if($template->lembaga_desa)
                <div class="col-12">
                    {!! $template->lembaga_desa !!}
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