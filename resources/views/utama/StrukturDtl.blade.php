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
                        <li class="breadcrumb-item active" aria-current="page">{{$data->jabatan}}</li>
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
                                <a href="{{url('struktur')}}" class="post-cata cata-md cata-default btn-s">Struktur Organisasi</a>
                            </div>
                            @foreach($struktur as $key)
                            <div class="post-content _center">
                                <a href="{{url('strukturdtl')}}/{{$key->id}}" class="post-cata cata-md cata-default {{$data->id==$key->id ? 'btn-s-active' : 'btn-s'}}">{{$key->jabatan}}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-3">
                    <img src="{{asset($data->foto)}}" alt="" class="foto-struktur">
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <table class="table table-hover table-struktur">
                        <tbody>
                        <tr>
                            <td style="width:35%"><b>Jabatan</b></td>
                            <td style="width:65%">: {{$data->jabatan}}</td>
                        </tr>
                        <tr>
                            <td><b>Nama Pejabat</b></td>
                            <td>: {{$data->nama_pejabat}}</td>
                        </tr>
                        <tr>
                            <td><b>Tugas</b></td>
                            <td>{!!$data->ket!!}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')

@endsection