@extends('layouts.ranking')

@section('header')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('layout/adminlte3/dist/css/adminlte.min.css') }}">
  
@endsection

@section('contentheader')
<h4 class="m-0 align_center" style="color: #3a82ff !important;font-weight: bold;">Ranking</h4>
@endsection

@section('contentheadermenu')
<ol class="breadcrumb float-sm-right">
    <!-- <li class="breadcrumb-item">Master</li> -->
    <li class="breadcrumb-item active">Ranking</li>
</ol>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">Foto Beranda</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
              @if(count($kolom)<=0)
                <center>Belum Ada Data</center>
              @else
             
              <button type="button" class="btn btn-md btn-primary btn-absolute">Diupdate terakhir tanggal : xx/xx/xxxx</button>
                <table id="tabledata" class="table  table-striped">
                  <thead>
                  <tr>
                    <!-- <th>No</th> -->
                    @php
                    $judulkolom=array();
                    @endphp

                    @foreach($kolom as $datakolom)
                    @php
                    array_push($judulkolom,$datakolom->judul)
                    @endphp
                    <th>{{$datakolom->judul}}</th>
                    @endforeach
                  
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $key)
                  <tr>
                    <!-- <td width="1%">{{$loop->iteration}}</td> -->
                    @if(count($kolom)>0)
                      @for($a=1 ; $a<=count($kolom) ; $a++)
                      @php
                        $valtable = "val".$a;
                        $atable = "a".$a;
                      @endphp
                      @if($key->$atable)
                        <td width="25%"><a target="_blank" href="{{$key->$atable}}">{{$key->$valtable}}</a></td>
                      @else
                        <td width="25%">{{$key->$valtable}}</td>
                      @endif
                      @endfor
                    @endif
              
                  </tr>
                  @endforeach
                  </tbody>
                  <!-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> -->
                </table>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @foreach($data as $key)                   
    <!-- Modal Edit -->
    <div class="modal fade" id="modal-edit-{{$key->id}}">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" id="formData_{{$key->id}}" class="form-horizontal">
            @csrf
            <div class="modal-body">
              <!-- <div class="card-body"> -->
                @if(count($kolom)>0)
                <div class="row">
                  @for($a=1 ; $a<=count($kolom) ; $a++)
                  @php
                  $valtable = "val".$a;
                  $atable = "a".$a;
                  @endphp
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="val_{{$a}}_{{$key->id}}">{{$judulkolom[$a-1]}}<span class="bintang">*</span></label>
                      <input type="text" class="form-control" id="val_{{$a}}_{{$key->id}}" name="val_{{$a}}[]" placeholder="{{$judulkolom[$a-1]}}" value="{{$key->$valtable}}">
                    </div>  
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="a_{{$a}}_{{$key->id}}">Link</label>
                      <input type="text" class="form-control" id="a_{{$a}}_{{$key->id}}" name="a_{{$a}}[]" placeholder="Link" value="{{$key->$atable}}">
                    </div>  
                  </div>  
                  @endfor
                </div>  
                @endif
               
                <!-- /.form-group -->
              <!-- </div> -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <label class="ket-bintang">Bertanda <span class="bintang">*</span> Wajib diisi</label>
                <button type="submit" class="btn btn-danger btn-submit-data" idform="{{$key->id}}">Simpan</button>
            </div>
          </form>
        </div>
      <!-- /.modal-content -->
      </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal edit -->

    <!-- Modal Hapus -->
    <div class="modal fade" id="modal-hapus-{{$key->id}}">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" id="formHapus_{{$key->id}}" class="form-horizontal">
            @csrf
            <div class="modal-body">
                <h6> Apakah anda ingin menghapus data ini?</h6>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger btn-hapus" idform="{{$key->id}}">Hapus</button>
            </div>
          </form>
        </div>
      <!-- /.modal-content -->
      </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.Modal Hapus -->
@endforeach

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="_formData" class="form-horizontal">
          @csrf
          <div class="modal-body">
              <!-- <div class="card-body"> -->
                @if(count($kolom)>0)
                <div class="row">
                  @for($a=1 ; $a<=count($kolom) ; $a++)
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="val_{{$a}}_add">{{$judulkolom[$a-1]}}<span class="bintang">*</span></label>
                      <input type="text" class="form-control" id="val_{{$a}}_add" name="val_{{$a}}_add" placeholder="{{$judulkolom[$a-1]}}">
                    </div>  
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="a_{{$a}}_add">Link</label>
                      <input type="text" class="form-control" id="a_{{$a}}_add" name="a_{{$a}}_add" placeholder="Link">
                    </div>  
                  </div>
                  @endfor
                </div>
                @endif
              <!-- <div class="card-body"> -->
              <!-- /.form-group -->
            <!-- </div> -->
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <label class="ket-bintang">Bertanda <span class="bintang">*</span> Wajib diisi</label>
              <button type="submit" class="btn btn-danger">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal edit -->

@endsection

@section('footer')
<!-- Custom Input File -->
<script src="{{ asset('layout/adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- jQuery -->
<script src="{{ asset('layout/adminlte3/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('layout/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{ asset('layout/adminlte3/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('layout/adminlte3/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('layout/adminlte3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('layout/adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('layout/adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('layout/adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('layout/adminlte3/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('layout/adminlte3/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('layout/adminlte3/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('layout/adminlte3/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('layout/adminlte3/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<!-- DatePicker -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css"> -->
<!--  Flatpickr  -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script> -->

<script>
  $(document).ready(function(){
    // NIK
    // $(".int").on('input paste', function () {
    //   hanyaAngka(this);
    // });
    // bsCustomFileInput.init();
    // $(document).on('change', '.input-foto', function (e) {
    //     var idphoto = $(this).attr('id');
    //     onlyPhoto(idphoto);
    // });
    datatabletablec("tabledata");

    // $(document).on('change', '.input-photo', function (e) {
    //     var idphoto = $(this).attr('id');
    //     onlyPhoto(idphoto);
    // });

    //Fungsi Hapus Data
    $(document).on('click', '.btn-hapus', function (e) {
        idform = $(this).attr('idform');
        var formData = new FormData($('#formHapus_' + idform)[0]);

        var url = "{{ url('admin/hapustablec') }}/"+idform;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'POST',
            dataType: "JSON",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $.LoadingOverlay("show");
            },
            success: function (response) {
                    if (response.status == true) {
                      $('.modal').modal('hide');
                      Swal.fire({
                          html: response.message,
                          icon: 'success',
                          showConfirmButton: false
                        });
                        reload(1000);
                    }else{
                      Swal.fire({
                          html: response.message,
                          icon: 'error',
                          confirmButtonText: 'Ok'
                      });
                    }
            },
            error: function (xhr, status) {
                alert('Error!!!');
            },
            complete: function () {
                $.LoadingOverlay("hide");
            }
        });
    });
    

    // Fungsi Ubah Data
    $(document).on('click', '.btn-submit-data', function (e) {
        idform = $(this).attr('idform');
        $('#formData_'+idform).validate({
          rules: {
            'val_1[]': {
              required: true
            },
            'val_2[]': {
              required: true
            },
            'val_3[]': {
              required: true
            },
            'val_4[]': {
              required: true
            },
            'val_5[]': {
              required: true
            },
            'val_6[]': {
              required: true
            },
            'val_7[]': {
              required: true
            },
            'val_8[]': {
              required: true
            },
            'val_9[]': {
              required: true
            },
            'val_10[]': {
              required: true
            },
            'val_11[]': {
              required: true
            },
            'val_12[]': {
              required: true
            },
            'val_13[]': {
              required: true
            },
            'val_14[]': {
              required: true
            },
            'val_15[]': {
              required: true
            },
            'val_16[]': {
              required: true
            },
            'val_17[]': {
              required: true
            },
            'val_18[]': {
              required: true
            },
            'val_19[]': {
              required: true
            },
            'val_20[]': {
              required: true
            }
          },
          messages: {
            'val_1[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_2[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_3[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_4[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_5[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_6[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_7[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_8[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_9[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_10[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_11[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_12[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_13[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_14[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_15[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_16[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_17[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_18[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_19[]': {
              required: "Kolom ini tidak boleh kosong"
            },
            'val_20[]': {
              required: "Kolom ini tidak boleh kosong"
            }
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          },

          submitHandler: function () {
          
            var formData = new FormData($('#formData_'+idform)[0]);

            var url = "{{ url('admin/updatetablec') }}/"+idform;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $.LoadingOverlay("show");
                },
                success: function (response) {
                    if (response.status == true) {
                      Swal.fire({
                          html: response.message,
                          icon: 'success',
                          showConfirmButton: false
                        });
                        reload(1000);
                    }else{
                      Swal.fire({
                          html: response.message,
                          icon: 'error',
                          confirmButtonText: 'Ok'
                      });
                    }
                },
                error: function (xhr, status) {
                    alert('Error!!!');
                },
                complete: function () {
                    $.LoadingOverlay("hide");
                }
            });   
          }
        });
    });

    // Fungsi Add Data
    $('#_formData').validate({
          rules: {
            val_1_add: {
              required: true
            },
            val_2_add: {
              required: true
            },
            val_3_add: {
              required: true
            },
            val_4_add: {
              required: true
            },
            val_5_add: {
              required: true
            },
            val_6_add: {
              required: true
            },
            val_7_add: {
              required: true
            },
            val_8_add: {
              required: true
            },
            val_9_add: {
              required: true
            },
            val_10_add: {
              required: true
            },
            val_11_add: {
              required: true
            },
            val_12_add: {
              required: true
            },
            val_13_add: {
              required: true
            },
            val_14_add: {
              required: true
            },
            val_15_add: {
              required: true
            },
            val_16_add: {
              required: true
            },
            val_17_add: {
              required: true
            },
            val_18_add: {
              required: true
            },
            val_19_add: {
              required: true
            },
            val_20_add: {
              required: true
            }
          },
          messages: {
            val_1_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_2_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_3_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_4_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_5_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_6_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_7_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_8_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_9_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_10_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_11_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_12_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_13_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_14_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_15_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_16_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_17_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_18_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_19_add: {
              required: "Kolom ini tidak boleh kosong"
            },
            val_20_add: {
              required: "Kolom ini tidak boleh kosong"
            }
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
              if (element.hasClass('_select2')) {     
                  element.parent().addClass('select2-error');
                  error.addClass('invalid-feedback');
                  element.closest('.form-group').append(error);
              }else if (element.hasClass('input-foto')){
                  element.parent().addClass('input-foto-error');
                  error.addClass('invalid-feedback');
                  element.closest('.form-group').append(error);
              }else {                                      
                  error.addClass('invalid-feedback');
                  element.closest('.form-group').append(error);
              }
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
              if(element.tagName.toLowerCase()=='select'){
                var x = element.getAttribute('id');
                $('#'+x).parent().addClass('select2-error');
              }else if(element.tagName.toLowerCase()=='input'){
                var x = element.getAttribute('class');
                var z = element.getAttribute('id');
                if(x=="input-foto is-invalid"){
                  $('#'+z).parent().addClass('input-foto-error');
                }
              }
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
              if(element.tagName.toLowerCase()=='select'){
                var x = element.getAttribute('id');
                $('#'+x).parent().removeClass('select2-error');
              }else if(element.tagName.toLowerCase()=='input'){
                var x = element.getAttribute('class');
                var z = element.getAttribute('id');
                if(x=="input-foto"){
                  $('#'+z).parent().removeClass('input-foto-error');
                }
              }
            },

          submitHandler: function () {
          
            var formData = new FormData($('#_formData')[0]);

            var url = "{{ url('admin/storetablec') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $.LoadingOverlay("show");
                },
                success: function (response) {
                    if (response.status == true) {
                        Swal.fire({
                          html: response.message,
                          icon: 'success',
                          showConfirmButton: false
                        });
                        reload(1000);
                    }else{
                      Swal.fire({
                          html: response.message,
                          icon: 'error',
                          confirmButtonText: 'Ok'
                      });
                    }
                },
                error: function (xhr, status) {
                    alert('Error!!!');
                },
                complete: function () {
                    $.LoadingOverlay("hide");
                }
            });   
          }
      });

  });
</script>

@endsection