<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @php
    $template = App\Models\Template::where('id','<>','~')->first();
    $batasmenu = App\Models\Menu::max('posisi');
  @endphp
  <title>{{$template->nama}}</title>
  <link href="{{ asset($template->logo_kecil) }}" rel="icon">

  <link rel="stylesheet" href="{{ asset('css/global.css') }}">
  <link rel="stylesheet" href="{{ asset('css/adminlte3.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- SweetAlert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .brand-link .brand-image {
        margin-top: 0px !important;
    }
    .brand-link {
        line-height: 1.9 !important;
        color: #8b8b8b !important;
        background: white;
        border-bottom: 1px solid #dee2e6 !important;
    }
    [class*=sidebar-dark-] .nav-header {
        color: #3a82ff !important;
        font-weight:bold;
    }
    [class*=sidebar-dark-] .sidebar a {
        color: rgba(0,0,0,.7) !important;
    }
    [class*=sidebar-dark-] {
        background-color: white !important;
    }
    .nav-icon.fas.fa-folder{
      color:#cfcf00 !important;
    }
    .nav-sidebar .li_x .nav-link>.right, .nav-sidebar .li_x .nav-link>p>.right {
        right: 1.8rem !important;
        top: 0.9rem !important;
    }
    nav ul .li_x ._sidenew:hover {
        color: #000 !important;
    }
    .li_x .nav-item {
        border-left: 2px solid #767676;
        border-left-style: dotted;
    }
    .menuactive {
        background-color: #007bff21;
    }
    .menuactive:hover {
        background-color: #007bff21 !important;
    }
  </style>

  @section('header')        

  @show

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img style="border-radius:28px" class="animation__wobble" src="{{ asset($template->logo_kecil) }}" alt="Logo" height="75" width="auto">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav d-block d-md-none d-lg-none">
      <li class="nav-item"> 
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->

      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
         
            <div class="media">
              <img src="{{ asset('layout/adminlte3/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
           
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          
            <div class="media">
              <img src="{{ asset('layout/adminlte3/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            
            <div class="media">
              <img src="{{ asset('layout/adminlte3/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        {{ ucfirst(Auth::user()->name) }} <i class="far fa-user"></i>
          <!-- <span class="badge badge-warning navbar-badge">15</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- <span class="dropdown-item dropdown-header">Profil</span> -->
          <div class="dropdown-divider"></div>
          <a href="{{url('admin/profil')}}" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profil
            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
            <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a> -->
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Logout</a> -->
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      @else
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{url('login')}}">
        Login <i class="far fa-user"></i>
          <!-- <span class="badge badge-warning navbar-badge">15</span> -->
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      @endif
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link" style="font-size:1rem">
      <img src="{{ asset($template->logo_kecil) }}" style="max-height: 30px;box-shadow: none !important;" alt="{{ $template->nama }}" class="brand-image img-circle elevation-3">
      <span style="font-weight:500 !important;" class="brand-text font-weight-light">{{ $template->nama }}</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
         
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-header">POHON KINERJA</li>

          @php
            $menu1 = App\Models\Menu::where('posisi',1)->get();
          @endphp
          @foreach($menu1 as $datamenu1)
          <li class="li_x nav-item">
            <a href="#" class="nav-link" style="display: table-cell;">
              <i class="right fas fa-angle-left"></i>
              <i class="nav-icon fas fa-folder" style="display: contents;"></i>
              <p>
              </p>
            </a>
            <a href="{{url('kinerja')}}/{{$datamenu1->id}}" class="_sidenew {{$menu==$datamenu1->id ? 'menuactive' : ''}}">{{$datamenu1->nama}}</a>
            <ul class="nav nav-treeview">
            @php
              $menu2 = App\Models\Menu::where('parent_menu',$datamenu1->id)->get();
            @endphp
            @foreach($menu2 as $datamenu2)
            <li class="nav-item">
              <a href="#" class="nav-link" style="display: table-cell;">
                <i class="right fas fa-angle-left"></i>
                <i class="nav-icon fas fa-folder" style="display: contents;"></i>
                <p>
                </p>
              </a>
              <a href="{{url('kinerja')}}/{{$datamenu2->id}}" class="_sidenew {{$menu==$datamenu2->id ? 'menuactive' : ''}}">{{$datamenu2->nama}}</a>
              <ul class="nav nav-treeview">
              @php
                $menu3 = App\Models\Menu::where('parent_menu',$datamenu2->id)->get();
              @endphp
              @foreach($menu3 as $datamenu3)
              <li class="nav-item">
                <a href="#" class="nav-link" style="display: table-cell;">
                  <i class="right fas fa-angle-left"></i>
                  <i class="nav-icon fas fa-folder" style="display: contents;"></i>
                  <p>
                  </p>
                </a>
                <a href="{{url('kinerja')}}/{{$datamenu3->id}}" class="_sidenew {{$menu==$datamenu3->id ? 'menuactive' : ''}}">{{$datamenu3->nama}}</a>
                <ul class="nav nav-treeview">
                @php
                    $menu4 = App\Models\Menu::where('parent_menu',$datamenu3->id)->get();
                  @endphp
                  @foreach($menu4 as $datamenu4)
                  <li class="nav-item">
                    <a href="#" class="nav-link" style="display: table-cell;">
                      <i class="right fas fa-angle-left"></i>
                      <i class="nav-icon fas fa-folder" style="display: contents;"></i>
                      <p>
                      </p>
                    </a>
                    <a href="{{url('kinerja')}}/{{$datamenu4->id}}" class="_sidenew {{$menu==$datamenu4->id ? 'menuactive' : ''}}">{{$datamenu4->nama}}</a>
                    <ul class="nav nav-treeview">
                    @php
                      $menu5 = App\Models\Menu::where('parent_menu',$datamenu4->id)->get();
                    @endphp
                    @foreach($menu5 as $datamenu5)
                    <li class="nav-item">
                      <a href="#" class="nav-link" style="display: table-cell;">
                        <i class="right fas fa-angle-left"></i>
                        <i class="nav-icon fas fa-folder" style="display: contents;"></i>
                        <p>
                        </p>
                      </a>
                      <a href="{{url('kinerja')}}/{{$datamenu5->id}}" class="_sidenew {{$menu==$datamenu5->id ? 'menuactive' : ''}}">{{$datamenu5->nama}}</a>
                      <ul class="nav nav-treeview">
                      @php
                      $menu6 = App\Models\Menu::where('parent_menu',$datamenu5->id)->get();
                      @endphp
                      @foreach($menu6 as $datamenu6)
                      <li class="nav-item">
                        <a href="#" class="nav-link" style="display: table-cell;">
                          <i class="right fas fa-angle-left"></i>
                          <i class="nav-icon fas fa-folder" style="display: contents;"></i>
                          <p>
                          </p>
                        </a>
                        <a href="{{url('kinerja')}}/{{$datamenu6->id}}" class="_sidenew {{$menu==$datamenu6->id ? 'menuactive' : ''}}">{{$datamenu6->nama}}</a>
                        <ul class="nav nav-treeview">
                        @php
                        $menu7 = App\Models\Menu::where('parent_menu',$datamenu6->id)->get();
                        @endphp
                        @foreach($menu7 as $datamenu7)
                        <li class="nav-item">
                          <a href="#" class="nav-link" style="display: table-cell;">
                            <i class="right fas fa-angle-left"></i>
                            <i class="nav-icon fas fa-folder" style="display: contents;"></i>
                            <p>
                            </p>
                          </a>
                          <a href="{{url('kinerja')}}/{{$datamenu7->id}}" class="_sidenew {{$menu==$datamenu7->id ? 'menuactive' : ''}}">{{$datamenu7->nama}}</a>
                          <ul class="nav nav-treeview">
                          @php
                          $menu8 = App\Models\Menu::where('parent_menu',$datamenu7->id)->get();
                          @endphp
                          @foreach($menu8 as $datamenu8)
                          <li class="nav-item">
                            <a href="#" class="nav-link" style="display: table-cell;">
                              <i class="right fas fa-angle-left"></i>
                              <i class="nav-icon fas fa-folder" style="display: contents;"></i>
                              <p>
                              </p>
                            </a>
                            <a href="{{url('kinerja')}}/{{$datamenu8->id}}" class="_sidenew {{$menu==$datamenu8->id ? 'menuactive' : ''}}">{{$datamenu8->nama}}</a>
                            <ul class="nav nav-treeview">
                            @php
                            $menu9 = App\Models\Menu::where('parent_menu',$datamenu8->id)->get();
                            @endphp
                            @foreach($menu9 as $datamenu9)
                            <li class="nav-item">
                              <a href="#" class="nav-link" style="display: table-cell;">
                                <i class="right fas fa-angle-left"></i>
                                <i class="nav-icon fas fa-folder" style="display: contents;"></i>
                                <p>
                                </p>
                              </a>
                              <a href="{{url('kinerja')}}/{{$datamenu9->id}}" class="_sidenew {{$menu==$datamenu9->id ? 'menuactive' : ''}}">{{$datamenu9->nama}}</a>
                              <ul class="nav nav-treeview">
                              @php
                              $menu10 = App\Models\Menu::where('parent_menu',$datamenu9->id)->get();
                              @endphp
                              @foreach($menu10 as $datamenu10)
                              <li class="nav-item">
                                <a href="#" class="nav-link" style="display: table-cell;">
                                  <i class="right fas fa-angle-left"></i>
                                  <i class="nav-icon fas fa-folder" style="display: contents;"></i>
                                  <p>
                                  </p>
                                </a>
                                <a href="{{url('kinerja')}}/{{$datamenu10->id}}" class="_sidenew {{$menu==$datamenu10->id ? 'menuactive' : ''}}">{{$datamenu10->nama}}</a>
                                <ul class="nav nav-treeview">
                                </ul>
                              </li>
                              @endforeach
                              </ul>
                            </li>
                            @endforeach
                            </ul>
                          </li>
                          @endforeach
                          </ul>
                        </li>
                        @endforeach
                        </ul>
                      </li>
                      @endforeach
                      </ul>
                    </li>
                    @endforeach
                    </ul>
                  </li>
                  @endforeach
                </ul>
              </li>
              @endforeach
              </ul>
            </li>
            @endforeach
            </ul>
          </li>
          @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @section('contentheader')        

            @show
          </div><!-- /.col -->
          <div class="col-sm-6">
            @section('contentheadermenu')        

            @show
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @section('content')        

    @show

    <!-- Modal Photo -->
    <div class="modal fade" id="modal-image">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="modal-title-image"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="text-align:center;padding:0px">
                <a id="modal-body-href" target="_blank" href=""><img style="width:100%;height:auto" id="modal-body-image" src="" alt=""></a>
            </div>
            <!-- <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer> -->
</div>
<!-- ./wrapper -->

@section('footer')        

@show

<!-- Global -->
<script src="{{ asset('js/global.js') }}"></script>

<!-- Loading Overlay -->
<script src='https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js'></script>
<!-- Select2 -->
<script src="{{ asset('layout/adminlte3/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- CUSTOM -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
   $(document).ready(function(){
      $('._lazyload').lazyload();
      $('[data-toggle="tooltip"]').tooltip({
          trigger : 'hover'
      });
      x = $(".menuactive").parents(".nav-item").addClass('menu-open');
   });
</script>
<!-- Pooper -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
</body>
</html>
