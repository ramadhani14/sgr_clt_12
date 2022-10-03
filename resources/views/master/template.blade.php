@extends('layouts.Adminlte3')

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
<h1 class="m-0">Website Setting</h1>
@endsection

@section('contentheadermenu')
<ol class="breadcrumb float-sm-right">
    <!-- <li class="breadcrumb-item">Master</li> -->
    <li class="breadcrumb-item active">Website Setting</li>
</ol>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
           
              <div class="card-body">
              <!-- <span data-toggle="tooltip" data-placement="left" title="Tambah Data">
                <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-sm btn-primary btn-add-absolute">
                  <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
              </span> -->
              <!-- <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-md btn-primary btn-absolute">Tambah</button> -->
                <table id="tabledata" class="table  table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Website</th>
                    <th>No.Hp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($template as $key)
                  <tr>
                    <td width="1%">{{$loop->iteration}}</td>
                    <td width="20%">{{$key->nama}}</td>
                    <td width="20%">{{$key->no_hp}}</td>
                    <td width="30%">{{$key->alamat}}</td>
                    <td width="1%" class="_align_center">
                      <div class="btn-group">
                        <span data-toggle="tooltip" data-placement="left" title="Lihat Logo Besar">
                            <button onclick="modalImage('Logo Besar','{{asset($key->logo_besar)}}')" class="btn btn-sm btn-outline-success"><i class="fas fa-eye"></i></button>
                        </span>
                        <span data-toggle="tooltip" data-placement="left" title="Lihat Logo Kecil">
                            <button onclick="modalImage('Logo Kecil','{{asset($key->logo_kecil)}}')" class="btn btn-sm btn-outline-success"><i class="fas fa-eye"></i></button>
                        </span>
                        <span data-toggle="tooltip" data-placement="left" title="Ubah Data">
                          <button data-toggle="modal" data-target="#modal-edit-{{$key->id}}" type="button" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
                        </span>
                       
                      </div>
                    </td>
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
    @foreach($template as $key)                   
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
                <div class="form-group">
                    <label for="nama_{{$key->id}}">Nama Website<span class="bintang">*</span></label>
                    <input type="text" class="form-control" id="nama_{{$key->id}}" name="nama[]" placeholder="Nama Website" value="{{$key->nama}}">
                </div>
                <div class="form-group">
                    <label for="email_{{$key->id}}">Email<span class="bintang">*</span></label>
                    <input type="text" class="form-control" id="email_{{$key->id}}" name="email[]" placeholder="Email" value="{{$key->email}}">
                </div>
                <div class="form-group">
                    <label for="no_telp_{{$key->id}}">No.Telp</label>
                    <input type="text" class="form-control" id="no_telp_{{$key->id}}" name="no_telp[]" placeholder="No.Telp" value="{{$key->no_telp}}">
                </div>
                <div class="form-group">
                    <label for="no_wa_{{$key->id}}">No.Wa</label>
                    <input type="text" class="form-control" id="no_wa_{{$key->id}}" name="no_wa[]" placeholder="No.Wa" value="{{$key->no_wa}}">
                </div>
                <div class="form-group">
                    <label for="alamat_{{$key->id}}">Alamat</label>
                    <textarea name="alamat[]" id="alamat_{{$key->id}}" rows="5" class="form-control" placeholder="Alamat">{{$key->alamat}}</textarea>  
                </div> 
                <div class="form-group">
                    <label for="kode_pos_{{$key->id}}">Kode Pos</label>
                    <input type="text" class="form-control angka" id="kode_pos_{{$key->id}}" name="kode_pos[]" placeholder="Kode Pos" value="{{$key->kode_pos}}">
                </div> 
                <div class="form-group">
                  <label for="logo-besar">Logo Besar <span class="input-keterangan">(jpg/jpeg/png)</span></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input input-foto" idlabel="label-logo-besar-{{$key->id}}" name="logo_besar[]" id="logo-besar-{{$key->id}}">
                      <label id="label-logo-besar-{{$key->id}}" class="custom-file-label" for="logo-besar">Pilih File</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="logo-kecil">Logo Kecil <span class="input-keterangan">(jpg/jpeg/png)</span></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input input-foto" idlabel="label-logo-kecil-{{$key->id}}" name="logo_kecil[]" id="logo-kecil-{{$key->id}}">
                      <label id="label-logo-kecil-{{$key->id}}" class="custom-file-label" for="logo-kecil">Pilih File</label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                    <label for="facebook_{{$key->id}}">Facebook</label>
                    <input type="text" class="form-control" id="facebook_{{$key->id}}" name="facebook[]" placeholder="Facebook" value="{{$key->facebook}}">
                </div>
                <div class="form-group">
                    <label for="twitter_{{$key->id}}">Twitter</label>
                    <input type="text" class="form-control" id="twitter_{{$key->id}}" name="twitter[]" placeholder="Twitter" value="{{$key->twitter}}">
                </div>
                <div class="form-group">
                    <label for="youtube_{{$key->id}}">Youtube</label>
                    <input type="text" class="form-control" id="youtube_{{$key->id}}" name="youtube[]" placeholder="Youtube" value="{{$key->youtube}}">
                </div>
                <div class="form-group">
                    <label for="linkedin_{{$key->id}}">Linkedin</label>
                    <input type="text" class="form-control" id="linkedin_{{$key->id}}" name="linkedin[]" placeholder="Linkedin" value="{{$key->linkedin}}">
                </div>
                <div class="form-group">
                    <label for="instagram_{{$key->id}}">Instagram</label>
                    <input type="text" class="form-control" id="instagram_{{$key->id}}" name="instagram[]" placeholder="Instagram" value="{{$key->instagram}}">
                </div>
                           
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


    <!-- /.Modal Hapus -->
@endforeach


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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
<!--  Flatpickr  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
<!-- Tinymce -->
<script src="https://cdn.tiny.cloud/1/6yq8fapml30gqjogz5ilm4dlea09zn9rmxh9mr8fe907tqkj/tinymce/4/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  $(document).ready(function(){

    bsCustomFileInput.init();
    $(document).on('change', '.input-foto', function (e) {
        var idphoto = $(this).attr('id');
        onlyPhoto(idphoto);
    });

    $(".angka").on('input paste', function () {
      hanyaAngka(this);
    });

    datatablepeldtl("tabledata");

    tinymce.init({
        selector: ".content_", theme: "modern",
        plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: " | link unlink anchor | image media | forecolor backcolor  | print preview code ",
        image_advtab: true,
        height : "250",
        file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        /*
          Note: In modern browsers input[type="file"] is functional without
          even adding it to the DOM, but that might not be the case in some older
          or quirky browsers like IE, so you might want to add it to the DOM
          just in case, and visually hide it. And do not forget do remove it
          once you do not need it anymore.
        */

        input.onchange = function () {
          var file = this.files[0];

          var reader = new FileReader();
          reader.onload = function () {
            /*
              Note: Now we need to register the blob in TinyMCEs image blob
              registry. In the next release this part hopefully won't be
              necessary, as we are looking to handle it internally.
            */
            var id = 'blobid' + (new Date()).getTime();
            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            var base64 = reader.result.split(',')[1];
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            /* call the callback and populate the Title field with the file name */
            cb(blobInfo.blobUri(), { title: file.name });
          };
          reader.readAsDataURL(file);
        };

        input.click();
      }
    });
 

    // Fungsi Ubah Data
    $(document).on('click', '.btn-submit-data', function (e) {
        idform = $(this).attr('idform');
        $('#formData_'+idform).validate({
          rules: {
            'nama[]': {
              required: true
            },
            'email[]': {
              required: true
            }
          },
          messages: {
            'nama[]': {
              required: "Nama website tidak boleh kosong"
            },
            'email[]': {
              required: "Email tidak boleh kosong"
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

            var url = "{{ url('admin/updatetemplate') }}/"+idform;
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


  });
</script>

@endsection