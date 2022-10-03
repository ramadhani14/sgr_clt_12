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
<h1 class="m-0">Komoditas {{$header}}</h1>
@endsection

@section('contentheadermenu')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item">Komoditas</li>
    <li class="breadcrumb-item active">{{$header}}</li>
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
              <span data-toggle="tooltip" data-placement="left" title="Tambah Data">
                <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-sm btn-primary btn-add-absolute">
                  <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
              </span>
              
              <!-- <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-md btn-primary btn-absolute">Tambah</button> -->
                <table id="tabledata" class="table  table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Periode</th>
                    @if($datajenis->status_jenis==1)
                      <th>Jenis</th>
                    @else
                      <th>Kecamatan</th>
                    @endif
                    <th>Desa</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $key)
                  <tr>
                    <td width="1%">{{$loop->iteration}}</td>
                    <td><span class="d-none">{{$key->periode}}</span>{{bulanIndo($key->periode)}}</td>
                    <td>
                      @if($datajenis->status_jenis==1)
                        {{$key->jenis_r->judul}}
                      @else
                        {{$key->kecamatan_r->nama}}
                      @endif
                    </td>
                    @if($datajenis->status_jenis==1)
                    <td data-toggle="tooltip" data-placement="left" title="Kecamatan : {{$key->kecamatan_r->nama}}">{{$key->desa_r->nama}}</td>
                    @else
                    <td>{{$key->desa_r->nama}}</td>
                    @endif
                    <td width="1%" class="_align_center">
                      <div class="btn-group">
                        <span data-toggle="tooltip" data-placement="left" title="Ubah Data">
                          <button data-toggle="modal" data-target="#modal-edit-{{$key->id}}" type="button" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
                        </span>
                        <span data-toggle="tooltip" data-placement="left" title="Hapus Data">
                          <button data-toggle="modal" data-target="#modal-hapus-{{$key->id}}" type="button" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
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
                <!-- <div class="card-body"> -->
                <div class="form-group select2readonly">
                    <label for="provinsi_{{$key->id}}">Provinsi<span class="bintang">*</span></label>
                    <select class="form-control form-control-lg provinsi" id="provinsi_{{$key->id}}" name="provinsi[]" id_kabupaten="kabupaten_{{$key->id}}" id_kecamatan="kecamatan_{{$key->id}}" id_desa="desa_{{$key->id}}">
                      <option value=""></option>
                      @foreach($provinsi as $data)
                      <option value="{{$data->id}}" {{$data->id==$key->fk_provinsi ? "selected" : ""}}>{{$data->nama}}</option>
                      @endforeach
                    </select>
                </div>

                <div class="form-group select2readonly">
                    <label for="kabupaten_{{$key->id}}">Kota/Kabupaten<span class="bintang">*</span></label>
                    <select class="form-control form-control-lg kabupaten" id="kabupaten_{{$key->id}}" name="kabupaten[]" id_kecamatan="kecamatan_{{$key->id}}" id_desa="desa_{{$key->id}}">
                      <option value=""></option>
                      @php
                        $kabupatenedit = App\Models\MstKabupaten::where('fk_provinsi',$key->fk_provinsi)->get();
                      @endphp
                      @foreach($kabupatenedit as $data)
                      <option value="{{$data->id}}" {{$data->id==$key->fk_kabupaten ? "selected" : ""}}>{{$data->nama}}</option>
                      @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="kecamatan_{{$key->id}}">Kecamatan<span class="bintang">*</span></label>
                    <select class="form-control form-control-lg kecamatan" id="kecamatan_{{$key->id}}" name="kecamatan[]" id_desa="desa_{{$key->id}}">
                      <option value=""></option>
                      @php
                        $kecamatanedit = App\Models\MstKecamatan::where('fk_kabupaten',$key->fk_kabupaten)->get();
                      @endphp
                      @foreach($kecamatanedit as $data)
                      <option value="{{$data->id}}" {{$data->id==$key->fk_kecamatan ? "selected" : ""}}>{{$data->nama}}</option>
                      @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="desa_{{$key->id}}">Desa<span class="bintang">*</span></label>
                    <select class="form-control form-control-lg desa" id="desa_{{$key->id}}" name="desa[]">
                      <option value=""></option>
                      @php
                        $desaedit = App\Models\MstDesa::where('fk_kecamatan',$key->fk_kecamatan)->get();
                      @endphp
                      @foreach($desaedit as $data)
                      <option value="{{$data->id}}" {{$data->id==$key->fk_desa ? "selected" : ""}}>{{$data->nama}}</option>
                      @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <label for="tahun_{{$key->id}}">Tahun<span class="bintang">*</span></label>
                  <select class="form-control tahun" name="tahun[]" id="tahun_{{$key->id}}">
                        <option value=""></option>
                        @foreach(allyear() as $data)
                        <option value="{{$data}}" {{onlyTahun($key->periode)==$data ? "selected" : ""}}>{{$data}}</option>
                        @endforeach
                  </select>
                </div> 
                <div class="form-group">
                  <label for="bulan_{{$key->id}}">Bulan<span class="bintang">*</span></label>
                  <select class="form-control bulan" name="bulan[]" id="bulan_{{$key->id}}">
                        <option value=""></option>
                        @foreach(semuaBulan() as $data)
                        <option value="{{OnlyBulanPeriode($data)}}" {{onlyBulan($key->periode)==OnlyBulanPeriode($data) ? "selected" : ""}}>{{bulanToIndo($data)}}</option>
                        @endforeach
                  </select>
                </div>

                @if($datajenis->status_jenis==1)
                <div class="form-group">
                  <label for="jenis_{{$key->id}}">Jenis<span class="bintang">*</span></label>
                  <select class="form-control jenis" name="jenis[]" id="jenis_{{$key->id}}">
                        <option value=""></option>
                        @foreach($datadtljenis as $data)
                          @if($jenis=="hortikultura")
                          <option value="{{$data->id}}" {{$data->id==$key->fk_jenis_hortikultura ? "selected" : ""}}>{{$data->judul}}</option>
                          @elseif($jenis=="kehutanan")
                          <option value="{{$data->id}}" {{$data->id==$key->fk_jenis_kehutanan ? "selected" : ""}}>{{$data->judul}}</option>
                          @elseif($jenis=="penggunaan")
                          <option value="{{$data->id}}" {{$data->id==$key->fk_jenis_penggunaan ? "selected" : ""}}>{{$data->judul}}</option>
                          @elseif($jenis=="tanamanpangan")
                          <option value="{{$data->id}}" {{$data->id==$key->fk_jenis_tanaman_pangan ? "selected" : ""}}>{{$data->judul}}</option>
                          @elseif($jenis=="alat")
                          <option value="{{$data->id}}" {{$data->id==$key->fk_jenis_alat ? "selected" : ""}}>{{$data->judul}}</option>
                          @elseif($jenis=="hewanternak")
                          <option value="{{$data->id}}" {{$data->id==$key->fk_jenis_hewan_ternak ? "selected" : ""}}>{{$data->judul}} {{$data->kategori=='b' ? "(Kategori Hewan Ternak Besar)" : "(Kategori Hewan Ternak Kecil)" }}</option>
                          @endif
                        @endforeach
                  </select>
                </div>
                @endif

                @if($jenis=="hortikultura" || $jenis=="tanamanpangan")
                <div class="form-group">
                  <label for="luas_panen_{{$key->id}}">Luas Panen<span class="bintang">*</span> <span class="input-keterangan">(Hektar)</span></label>
                  <input type="text" class="form-control decimal" id="luas_panen_{{$key->id}}" name="luas_panen[]" placeholder="Luas Panen" value="{{str_replace('.', ',', $key->luas_panen)}}">
                </div> 
                
                <div class="form-group">
                  <label for="produktifitas_{{$key->id}}">Produktifitas<span class="bintang">*</span> <span class="input-keterangan">(%)</span></label>
                  <input type="text" class="form-control decimal" id="produktifitas_{{$key->id}}" name="produktifitas[]" placeholder="Produktifitas" value="{{str_replace('.', ',', $key->produktifitas)}}">
                </div> 

                <div class="form-group">
                  <label for="jumlah_produksi_{{$key->id}}">Jumlah Produksi<span class="bintang">*</span> <span class="input-keterangan">(Ton)</span></label>
                  <input type="text" class="form-control decimal" id="jumlah_produksi_{{$key->id}}" name="jumlah_produksi[]" placeholder="Jumlah Produksi" value="{{str_replace('.', ',', $key->jumlah_produksi)}}">
                </div> 
                @elseif($jenis=="kehutanan" || $jenis=="penggunaan")
                <div class="form-group">
                  <label for="luas_{{$key->id}}">Luas<span class="bintang">*</span> <span class="input-keterangan">(Hektar)</span></label>
                  <input type="text" class="form-control decimal" id="luas_{{$key->id}}" name="luas[]" placeholder="Luas" value="{{str_replace('.', ',', $key->luas)}}">
                </div> 
                
                <div class="form-group">
                  <label for="bibit_{{$key->id}}">Bibit<span class="bintang">*</span></label>
                  <input type="text" class="form-control int" id="bibit_{{$key->id}}" name="bibit[]" placeholder="bibit" value="{{$key->bibit}}">
                </div> 
                @elseif($jenis=="alat")
                <div class="form-group">
                  <label for="jumlah_alat_{{$key->id}}">Jumlah Alat<span class="bintang">*</span></label>
                  <input type="text" class="form-control int" id="jumlah_alat_{{$key->id}}" name="jumlah_alat[]" placeholder="Jumlah Alat" value="{{$key->jumlah_alat}}">
                </div> 
                @elseif($jenis=="hewanternak")
                <div class="form-group">
                  <label for="jumlah_ternak_{{$key->id}}">Jumlah Ternak<span class="bintang">*</span></label>
                  <input type="text" class="form-control int" id="jumlah_ternak_{{$key->id}}" name="jumlah_ternak[]" placeholder="Jumlah Ternak" value="{{$key->jumlah_ternak}}">
                </div> 
                <div class="form-group">
                  <label for="jenis_kelamin_{{$key->id}}">Jenis Kelamin<span class="bintang">*</span></label>
                  <select class="form-control jenis_kelamin" name="jenis_kelamin[]" id="jenis_kelamin_{{$key->id}}">
                        <option value=""></option>
                        <option value="j" {{$key->jenis_kelamin=="j" ? "selected" : ""}}>Jantan</option>
                        <option value="b" {{$key->jenis_kelamin=="b" ? "selected" : ""}}>Betina</option>
                  </select>
                </div>
                @elseif($jenis=="ikanlaut")
                <div class="form-group">
                  <label for="jumlah_produksi_{{$key->id}}">Jumlah Produksi<span class="bintang">*</span> <span class="input-keterangan">(Ton)</span></label>
                  <input type="text" class="form-control decimal" id="jumlah_produksi_{{$key->id}}" name="jumlah_produksi[]" placeholder="Jumlah Produksi" value="{{str_replace('.', ',', $key->jumlah_produksi)}}">
                </div> 
                <div class="form-group">
                  <label for="nilai_produksi_{{$key->id}}">Nilai Produksi<span class="bintang">*</span> <span class="input-keterangan">(Rupiah)</span></label>
                  <input type="text" class="form-control int" id="nilai_produksi_{{$key->id}}" name="nilai_produksi[]" placeholder="Nilai Produksi" value="{{$key->nilai_produksi}}">
                </div> 
                @endif
                <div class="form-group">
                  <label for="petani_{{$key->id}}">Petani Terkait<span class="bintang">*</span></label>
                  <select class="form-control petani" id="petani_{{$key->id}}" multiple="multiple" name="petani[]">
                        <option value=""></option>
                        @foreach($datapetani as $data)
                        @php
                        $statusselect = '';
                        foreach(json_decode($key->fk_mst_petani) as $petanidtl){
                            if($petanidtl==$data->id){
                              $statusselect='selected';
                            }
                        }
                        @endphp
                        <option value="{{$data->id}}" {{$statusselect}}>{{$data->nama}}</option>
                        @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="ket_{{$key->id}}">Keterangan</label>
                    <textarea name="ket[]" id="ket_{{$key->id}}" rows="5" class="form-control" placeholder="Keterangan">{{$key->ket}}</textarea>  
                </div> 
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
                <h6> Apakah anda ingin menghapus data periode {{bulanIndo($key->periode)}}?</h6>
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
          <input type="hidden" name="jenis" value="{{$jenis}}">
          <div class="modal-body">
              <!-- <div class="card-body"> -->
              <div class="form-group select2readonly">
                  <label for="provinsi_add">Provinsi<span class="bintang">*</span></label>
                  <select readonly class="form-control form-control-lg provinsi" id="provinsi_add" name="provinsi_add" id_kabupaten="kabupaten_add" id_kecamatan="kecamatan_add" id_desa="desa_add">
                    <option value=""></option>
                    @foreach($provinsi as $data)
                    <option value="{{$data->id}}" {{$data->id == 32 ? "selected" : ""}}>{{$data->nama}}</option>
                    @endforeach
                  </select>
              </div>

              <div class="form-group select2readonly">
                  <label for="kabupaten_add">Kota/Kabupaten<span class="bintang">*</span></label>
                  <select class="form-control form-control-lg kabupaten" id="kabupaten_add" name="kabupaten_add" id_kecamatan="kecamatan_add" id_desa="desa_add">
                    <option value=""></option>
                    @foreach($kabupaten as $data)
                    <option value="{{$data->id}}" {{$data->id == 3212 ? "selected" : ""}}>{{$data->nama}}</option>
                    @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="kecamatan_add">Kecamatan<span class="bintang">*</span></label>
                  <select class="form-control form-control-lg kecamatan" id="kecamatan_add" name="kecamatan_add" id_desa="desa_add">
                    <option value=""></option>
                    @foreach($kecamatan as $data)
                    <option value="{{$data->id}}" {{$data->id == 3212180 ? "selected" : ""}}>{{$data->nama}}</option>
                    @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="desa_add">Desa<span class="bintang">*</span></label>
                  <select class="form-control form-control-lg desa" id="desa_add" name="desa_add">
                    <option value=""></option>
                    @foreach($desa as $data)
                    <option value="{{$data->id}}" {{$data->id == 3212180005 ? "selected" : ""}}>{{$data->nama}}</option>
                    @endforeach
                  </select>
              </div>

              <div class="form-group">
                <label for="tahun_add">Tahun<span class="bintang">*</span></label>
                <select class="form-control tahun" name="tahun_add" id="tahun_add">
                      <option value=""></option>
                      @foreach(allyear() as $key)
                      <option value="{{$key}}">{{$key}}</option>
                      @endforeach
                </select>
              </div> 
              <div class="form-group">
                <label for="bulan_add">Bulan<span class="bintang">*</span></label>
                <select class="form-control bulan" name="bulan_add" id="bulan_add">
                      <option value=""></option>
                      @foreach(semuaBulan() as $key)
                      <option value="{{OnlyBulanPeriode($key)}}">{{bulanToIndo($key)}}</option>
                      @endforeach
                </select>
              </div>
              
              @if($datajenis->status_jenis==1)
              <div class="form-group">
                <label for="jenis_add">Jenis<span class="bintang">*</span></label>
                <select class="form-control jenis" name="jenis_add" id="jenis_add">
                      <option value=""></option>
                      @foreach($datadtljenis as $key)
                        @if($jenis=="hewanternak")
                        <option value="{{$key->id}}">{{$key->judul}} {{$key->kategori=='b' ? "(Kategori Hewan Ternak Besar)" : "(Kategori Hewan Ternak Kecil)" }}</option>
                        @else
                        <option value="{{$key->id}}">{{$key->judul}}</option>
                        @endif
                      @endforeach
                </select>
              </div>
              @endif
              
              @if($jenis=="hortikultura" || $jenis=="tanamanpangan")
              <div class="form-group">
                <label for="luas_panen_add">Luas Panen<span class="bintang">*</span> <span class="input-keterangan">(Hektar)</span></label>
                <input type="text" class="form-control decimal" id="luas_panen_add" name="luas_panen_add" placeholder="Luas Panen">
              </div> 

              <div class="form-group">
                <label for="produktifitas_add">Produktifitas<span class="bintang">*</span> <span class="input-keterangan">(%)</span></label>
                <input type="text" class="form-control decimal" id="produktifitas_add" name="produktifitas_add" placeholder="Produktifitas">
              </div> 

              <div class="form-group">
                <label for="jumlah_produksi_add">Jumlah Produksi<span class="bintang">*</span> <span class="input-keterangan">(Ton)</span></label>
                <input type="text" class="form-control decimal" id="jumlah_produksi_add" name="jumlah_produksi_add" placeholder="Jumlah Produksi">
              </div> 
              @elseif($jenis=="kehutanan" || $jenis=="penggunaan")
              <div class="form-group">
                <label for="luas_add">Luas<span class="bintang">*</span> <span class="input-keterangan">(Hektar)</span></label>
                <input type="text" class="form-control decimal" id="luas_add" name="luas_add" placeholder="Luas">
              </div> 

              <div class="form-group">
                <label for="bibit_add">Bibit<span class="bintang">*</span></label>
                <input type="text" class="form-control int" id="bibit_add" name="bibit_add" placeholder="Bibit">
              </div> 
              @elseif($jenis=="alat")
              <div class="form-group">
                <label for="jumlah_alat_add">Jumlah Alat<span class="bintang">*</span></label>
                <input type="text" class="form-control int" id="jumlah_alat_add" name="jumlah_alat_add" placeholder="Jumlah Alat">
              </div> 
              @elseif($jenis=="hewanternak")
              <div class="form-group">
                <label for="jumlah_ternak_add">Jumlah Ternak<span class="bintang">*</span></label>
                <input type="text" class="form-control int" id="jumlah_ternak_add" name="jumlah_ternak_add" placeholder="Jumlah Ternak">
              </div>
              <div class="form-group">
                <label for="jenis_kelamin_add">Jenis Kelamin<span class="bintang">*</span></label>
                <select class="form-control jenis_kelamin" name="jenis_kelamin_add" id="jenis_kelamin_add">
                      <option value=""></option>
                      <option value="j">Jantan</option>
                      <option value="b">Betina</option>
                </select>
              </div>
              @elseif($jenis=="ikanlaut")
              <div class="form-group">
                <label for="jumlah_produksi_add">Jumlah Produksi<span class="bintang">*</span> <span class="input-keterangan">(Ton)</span></label>
                <input type="text" class="form-control decimal" id="jumlah_produksi_add" name="jumlah_produksi_add" placeholder="Jumlah Produksi">
              </div> 
              <div class="form-group">
                <label for="nilai_produksi_add">Nilai Produksi<span class="bintang">*</span> <span class="input-keterangan">(Rupiah)</span></label>
                <input type="text" class="form-control int" id="nilai_produksi_add" name="nilai_produksi_add" placeholder="Nilai Produksi">
              </div> 
              @endif
              <div class="form-group">
                <label for="petani_add">Petani Terkait<span class="bintang">*</span></label>
                <select class="form-control petani" id="petani_add" multiple="multiple" name="petani_add[]">
                      <option value=""></option>
                      @foreach($datapetani as $key)
                      <option value="{{$key->id}}">{{$key->nama}}</option>
                      @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="ket_add">Keterangan</label>
                <textarea name="ket_add" id="ket_add" rows="5" class="form-control content_" placeholder="Keterangan"></textarea>  
              </div> 
          
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
<!--  Flatpickr  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
<!-- Tinymce -->
<script src="https://cdn.tiny.cloud/1/6yq8fapml30gqjogz5ilm4dlea09zn9rmxh9mr8fe907tqkj/tinymce/4/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  $(document).ready(function(){

    hanyaDecimal(".decimal");

    $('.tahun').select2({
        placeholder: "-- Tahun Periode --"
    });
    $('.bulan').select2({
        placeholder: "-- Bulan Periode --"
    });
    $('.jenis').select2({
        placeholder: "-- Jenis --"
    });
    $('.petani').select2({
        placeholder: "-- Petani Terkait --"
    });
    $('.jenis_kelamin').select2({
        placeholder: "-- Pilih Jenis Kelamin --"
    });

    getKabupaten('provinsi','kabupaten','kecamatan','desa','{{ url("/getKabupaten") }}','{{ url("/getKecamatan") }}','{{ url("/getDesa") }}');

    $(".int").on('input paste', function () {
      hanyaInteger(this);
    });

    datatablekomoditas("tabledata");

    //Fungsi Hapus Data
    $(document).on('click', '.btn-hapus', function (e) {
        idform = $(this).attr('idform');
        var formData = new FormData($('#formHapus_' + idform)[0]);

        var url = "{{ url('admin/hapuskomoditas') }}/{{$jenis}}/"+idform;
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
            'provinsi[]': {
              required: true
            },
            'kabupaten[]': {
              required: true
            },
            'kecamatan[]': {
              required: true
            },
            'desa[]': {
              required: true
            },
            'tahun[]': {
              required: true
            },
            'bulan[]': {
              required: true
            },
            'jenis[]': {
              required: true
            },
            'jenis_kelamin[]': {
              required: true
            },
            'luas_panen[]': {
              required: true
            },
            'produktifitas[]': {
              required: true
            },
            'jumlah_produksi[]': {
              required: true
            },
            'jumlah_alat[]': {
              required: true
            },
            'jumlah_ternak[]': {
              required: true
            },
            'nilai_produksi[]': {
              required: true
            },
            'luas[]': {
              required: true
            },
            'bibit[]': {
              required: true
            },
            'petani[]': {
              required: true
            }
          },
          messages: {
            'provinsi[]': {
              required: "Provinsi tidak boleh kosong"
            },
            'kabupaten[]': {
              required: "Kabupaten tidak boleh kosong"
            },
            'kecamatan[]': {
              required: "Kecamatan tidak boleh kosong"
            },
            'desa[]': {
              required: "Desa tidak boleh kosong"
            },
            'tahun[]': {
              required: "Tahun tidak boleh kosong"
            },
            'bulan[]': {
              required: "Bulan tidak boleh kosong"
            },
            'jenis[]': {
              required: "Jenis tidak boleh kosong"
            },
            'jenis_kelamin[]': {
              required: "Jenis kelamin tidak boleh kosong"
            },
            'luas_panen[]': {
              required: "Luas panen tidak boleh kosong"
            },
            'produktifitas[]': {
              required: "Produktifitas tidak boleh kosong"
            },
            'jumlah_produksi[]': {
              required: "Jumlah produksi tidak boleh kosong"
            },
            'jumlah_alat[]': {
              required: "Jumlah alat tidak boleh kosong"
            },
            'jumlah_ternak[]': {
              required: "Jumlah ternak tidak boleh kosong"
            },
            'nilai_produksi[]': {
              required: "Nilai produksi tidak boleh kosong"
            },
            'luas[]': {
              required: "Luas tidak boleh kosong"
            },
            'bibit[]': {
              required: "Bibit tidak boleh kosong"
            },
            'petani[]': {
              required: "Petani terkait tidak boleh kosong"
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
          
            var formData = new FormData($('#formData_'+idform)[0]);

            var url = "{{ url('admin/updatekomoditas') }}/{{$jenis}}/"+idform;
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
            provinsi_add: {
              required: true
            },
            kabupaten_add: {
              required: true
            },
            kecamatan_add: {
              required: true
            },
            desa_add: {
              required: true
            },
            tahun_add: {
              required: true
            },
            bulan_add: {
              required: true
            },
            bulan_add: {
              required: true
            },
            jenis_add: {
              required: true
            },
            jenis_kelamin_add: {
              required: true
            },
            luas_panen_add: {
              required: true
            },
            produktifitas_add: {
              required: true
            },
            jumlah_produksi_add: {
              required: true
            },
            jumlah_alat_add: {
              required: true
            },
            jumlah_ternak_add: {
              required: true
            },
            nilai_produksi_add: {
              required: true
            },
            luas_add: {
              required: true
            },
            bibit_add: {
              required: true
            },
            'petani_add[]': {
              required: true
            }
          },
          messages: {
            provinsi_add: {
              required: "Provinsi tidak boleh kosong"
            },
            kabupaten_add: {
              required: "Kota/Kabupaten tidak boleh kosong"
            },
            kecamatan_add: {
              required: "Kecamatan tidak boleh kosong"
            },
            desa_add: {
              required: "Desa tidak boleh kosong"
            },
            tahun_add: {
              required: "Tahun periode tidak boleh kosong"
            },
            bulan_add: {
              required: "Bulan periode tidak boleh kosong"
            },
            jenis_add: {
              required: "Jenis tidak boleh kosong"
            },
            jenis_kelamin_add: {
              required: "Jenis kelamin tidak boleh kosong"
            },
            luas_panen_add: {
              required: "Luas panen tidak boleh kosong"
            },
            produktifitas_add: {
              required: "Produktifitas tidak boleh kosong"
            },
            jumlah_produksi_add: {
              required: "Jumlah produksi tidak boleh kosong"
            },
            jumlah_alat_add: {
              required: "Jumlah alat tidak boleh kosong"
            },
            jumlah_ternak_add: {
              required: "Jumlah ternak tidak boleh kosong"
            },
            nilai_produksi_add: {
              required: "Nilai produksi tidak boleh kosong"
            },
            luas_add: {
              required: "Luas tidak boleh kosong"
            },
            bibit_add: {
              required: "Bibit tidak boleh kosong"
            },
            'petani_add[]': {
              required: "Pentani tekait tidak boleh kosong"
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

            var url = "{{ url('admin/storekomoditas') }}";
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