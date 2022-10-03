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
                        <li class="breadcrumb-item"><a href="{{url('download')}}">Download</a></li>
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
                <div class="col-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nama Dokumen</th>
                            <th>File</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key)
                        <tr>
                            <td>{{$key->judul}}</td>
                            <td><a target="_blank" href="{{asset($key->foto)}}" class="post-cata cata-sm cata-info" style="margin-bottom:0px">Download</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
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