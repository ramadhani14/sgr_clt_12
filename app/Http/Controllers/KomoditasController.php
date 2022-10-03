<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstKomoditas;
use App\Models\JenisAlat;
use App\Models\JenisHortikultura;
use App\Models\JenisKehutanan;
use App\Models\JenisPenggunaan;
use App\Models\JenisTanamanPangan;
use App\Models\JenisHewanTernak;
use App\Models\MstAlat;
use App\Models\MstHortikultura;
use App\Models\MstKehutanan;
use App\Models\MstPenggunaan;
use App\Models\MstTanamanPangan;
use App\Models\MstHewanTernak;
use App\Models\MstIkanLaut;
use App\Models\StatusNelayan;
use App\Models\MstPetani;
use App\Models\MstProvinsi;
use App\Models\MstKabupaten;
use App\Models\MstKecamatan;
use App\Models\MstDesa;
use App\Models\User;
use Carbon\Carbon;
use File;
use Auth;
use Illuminate\Support\Facades\Crypt;

class KomoditasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($jenis)
    {
        $menu = 'komoditas';
        $datajenis = MstKomoditas::where('komoditas',$jenis)->first();
        $datapetani = MstPetani::orderBy('id','desc')->get();
        $provinsi = MstProvinsi::all();
        $kabupaten = MstKabupaten::where('fk_provinsi',32)->get();
        $kecamatan = MstKecamatan::where('fk_kabupaten',3212)->get();
        $desa = MstDesa::where('fk_kecamatan',3212180)->get();
        $header=$datajenis->judul;
        $submenu=$datajenis->komoditas;
        if($datajenis->komoditas=='alat'){
            $data = MstAlat::orderBy('id','desc')->get();
            $datadtljenis = JenisAlat::orderBy('id','desc')->get();
        }elseif($datajenis->komoditas=='hortikultura'){
            $data = MstHortikultura::orderBy('id','desc')->get();
            $datadtljenis = JenisHortikultura::orderBy('id','desc')->get();
        }elseif($datajenis->komoditas=='kehutanan'){
            $data = MstKehutanan::orderBy('id','desc')->get();
            $datadtljenis = JenisKehutanan::orderBy('id','desc')->get();
        }elseif($datajenis->komoditas=='penggunaan'){
            $data = MstPenggunaan::orderBy('id','desc')->get();
            $datadtljenis = JenisPenggunaan::orderBy('id','desc')->get();
        }elseif($datajenis->komoditas=='tanamanpangan'){
            $data = MstTanamanPangan::orderBy('id','desc')->get();
            $datadtljenis = JenisTanamanPangan::orderBy('id','desc')->get();
        }elseif($datajenis->komoditas=='hewanternak'){
            $data = MstHewanTernak::orderBy('id','desc')->get();
            $datadtljenis = JenisHewanTernak::orderBy('id','desc')->get();
        }elseif($datajenis->komoditas=='ikanlaut'){
            $data = MstIkanLaut::orderBy('id','desc')->get();
            $datadtljenis = "";
        }
        $data_param = [
            'menu','submenu','data','header','jenis','datadtljenis','datapetani','provinsi','datajenis','kabupaten','kecamatan','desa'
        ];

        return view('master/komoditas')->with(compact($data_param));
    }
    public function store(Request $request)
    {
        $jenis = $request->jenis;
        $periode = $request->tahun_add.$request->bulan_add;

        if($jenis=='alat'){
            $cek = MstAlat::where('fk_jenis_alat',$request->jenis_add)->where('fk_desa',$request->desa_add)->where('periode',$periode)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi_add;
                $data['fk_kabupaten'] = $request->kabupaten_add;
                $data['fk_kecamatan'] = $request->kecamatan_add;
                $data['fk_desa'] = $request->desa_add;
                $data['periode'] = $periode;
                $data['fk_jenis_alat'] = $request->jenis_add;
                $data['jumlah_alat'] = $request->jumlah_alat_add;
                $data['fk_mst_petani'] = json_encode($request->petani_add);
                $data['ket'] = $request->ket_add;
                $data['created_by'] = Auth::id();
                $data['created_at'] = Carbon::now()->toDateTimeString();
                $createData = MstAlat::create($data); 
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil ditambah'
                ]);
            }
        }elseif($jenis=='hortikultura'){
            $cek = MstHortikultura::where('fk_jenis_hortikultura',$request->jenis_add)->where('fk_desa',$request->desa_add)->where('periode',$periode)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi_add;
                $data['fk_kabupaten'] = $request->kabupaten_add;
                $data['fk_kecamatan'] = $request->kecamatan_add;
                $data['fk_desa'] = $request->desa_add;
                $data['periode'] = $periode;
                $data['fk_jenis_hortikultura'] = $request->jenis_add;
                $data['luas_panen'] = str_replace(',', '.', $request->luas_panen_add);
                $data['produktifitas'] = str_replace(',', '.', $request->produktifitas_add);
                $data['jumlah_produksi'] = str_replace(',', '.', $request->jumlah_produksi_add);
                $data['fk_mst_petani'] = json_encode($request->petani_add);
                $data['ket'] = $request->ket_add;
                $data['created_by'] = Auth::id();
                $data['created_at'] = Carbon::now()->toDateTimeString();
                $createData = MstHortikultura::create($data); 
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil ditambah'
                ]);
            }
        }elseif($jenis=='kehutanan'){
            $cek = MstKehutanan::where('fk_jenis_kehutanan',$request->jenis_add)->where('fk_desa',$request->desa_add)->where('periode',$periode)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi_add;
                $data['fk_kabupaten'] = $request->kabupaten_add;
                $data['fk_kecamatan'] = $request->kecamatan_add;
                $data['fk_desa'] = $request->desa_add;
                $data['periode'] = $periode;
                $data['fk_jenis_kehutanan'] = $request->jenis_add;
                $data['luas'] = str_replace(',', '.', $request->luas_add);
                $data['bibit'] = $request->bibit_add;
                $data['fk_mst_petani'] = json_encode($request->petani_add);
                $data['ket'] = $request->ket_add;
                $data['created_by'] = Auth::id();
                $data['created_at'] = Carbon::now()->toDateTimeString();
                $createData = MstKehutanan::create($data); 
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil ditambah'
                ]);
            }
        }elseif($jenis=='penggunaan'){
            $cek = MstPenggunaan::where('fk_jenis_penggunaan',$request->jenis_add)->where('fk_desa',$request->desa_add)->where('periode',$periode)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi_add;
                $data['fk_kabupaten'] = $request->kabupaten_add;
                $data['fk_kecamatan'] = $request->kecamatan_add;
                $data['fk_desa'] = $request->desa_add;
                $data['periode'] = $periode;
                $data['fk_jenis_penggunaan'] = $request->jenis_add;
                $data['luas'] = str_replace(',', '.', $request->luas_add);
                $data['bibit'] = $request->bibit_add;
                $data['fk_mst_petani'] = json_encode($request->petani_add);
                $data['ket'] = $request->ket_add;
                $data['created_by'] = Auth::id();
                $data['created_at'] = Carbon::now()->toDateTimeString();
                $createData = MstPenggunaan::create($data); 
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil ditambah'
                ]);
            }
        }elseif($jenis=='tanamanpangan'){
            $cek = MstTanamanPangan::where('fk_jenis_tanaman_pangan',$request->jenis_add)->where('fk_desa',$request->desa_add)->where('periode',$periode)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi_add;
                $data['fk_kabupaten'] = $request->kabupaten_add;
                $data['fk_kecamatan'] = $request->kecamatan_add;
                $data['fk_desa'] = $request->desa_add;
                $data['periode'] = $periode;
                $data['fk_jenis_tanaman_pangan'] = $request->jenis_add;
                $data['luas_panen'] = str_replace(',', '.', $request->luas_panen_add);
                $data['produktifitas'] = str_replace(',', '.', $request->produktifitas_add);
                $data['jumlah_produksi'] = str_replace(',', '.', $request->jumlah_produksi_add);
                $data['fk_mst_petani'] = json_encode($request->petani_add);
                $data['ket'] = $request->ket_add;
                $data['created_by'] = Auth::id();
                $data['created_at'] = Carbon::now()->toDateTimeString();
                $createData = MstTanamanPangan::create($data); 
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil ditambah'
                ]);
            }
        }elseif($jenis=='hewanternak'){
            $cek = MstHewanTernak::where('fk_jenis_hewan_ternak',$request->jenis_add)->where('fk_desa',$request->desa_add)->where('periode',$periode)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi_add;
                $data['fk_kabupaten'] = $request->kabupaten_add;
                $data['fk_kecamatan'] = $request->kecamatan_add;
                $data['fk_desa'] = $request->desa_add;
                $data['periode'] = $periode;
                $data['fk_jenis_hewan_ternak'] = $request->jenis_add;
                $data['jenis_kelamin'] = $request->jenis_kelamin_add;
                $data['jumlah_ternak'] = $request->jumlah_ternak_add;
                $data['fk_mst_petani'] = json_encode($request->petani_add);
                $data['ket'] = $request->ket_add;
                $data['created_by'] = Auth::id();
                $data['created_at'] = Carbon::now()->toDateTimeString();
                $createData = MstHewanTernak::create($data); 
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil ditambah'
                ]);
            }
        }elseif($jenis=='ikanlaut'){
            $cek = MstIkanLaut::where('fk_desa',$request->desa_add)->where('periode',$periode)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi_add;
                $data['fk_kabupaten'] = $request->kabupaten_add;
                $data['fk_kecamatan'] = $request->kecamatan_add;
                $data['fk_desa'] = $request->desa_add;
                $data['periode'] = $periode;
                $data['jumlah_produksi'] = str_replace(',', '.', $request->jumlah_produksi_add);
                $data['nilai_produksi'] = $request->nilai_produksi_add;
                $data['fk_mst_petani'] = json_encode($request->petani_add);
                $data['ket'] = $request->ket_add;
                $data['created_by'] = Auth::id();
                $data['created_at'] = Carbon::now()->toDateTimeString();
                $createData = MstIkanLaut::create($data); 
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil ditambah'
                ]);
            }
        }elseif($jenis=='statusnelayan'){
            $cek = StatusNelayan::where('fk_desa',$request->desa_add)->where('periode',$periode)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi_add;
                $data['fk_kabupaten'] = $request->kabupaten_add;
                $data['fk_kecamatan'] = $request->kecamatan_add;
                $data['fk_desa'] = $request->desa_add;
                $data['periode'] = $periode;
                $data['pemilik_rtp'] = $request->pemilik_rtp_add;
                $data['buruh_rbtp'] = $request->buruh_rbtp_add;
                $data['fk_mst_petani'] = json_encode($request->petani_add);
                $data['ket'] = $request->ket_add;
                $data['created_by'] = Auth::id();
                $data['created_at'] = Carbon::now()->toDateTimeString();
                $createData = StatusNelayan::create($data); 
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil ditambah'
                ]);
            }
        }
    }

    public function update(Request $request, $jenis, $id)
    {
        
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        
        if($jenis=='alat'){
            $periode = $request->tahun[0].$request->bulan[0];
            $cek = MstAlat::where('fk_jenis_alat',$request->jenis[0])->where('fk_desa',$request->desa[0])->where('periode',$periode)->where('id','<>',$id)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode/jenis pada desa ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi[0];
                $data['fk_kabupaten'] = $request->kabupaten[0];
                $data['fk_kecamatan'] = $request->kecamatan[0];
                $data['fk_desa'] = $request->desa[0];
                $data['fk_jenis_alat'] = $request->jenis[0];
                $data['periode'] = $periode;
                $data['jumlah_alat'] = $request->jumlah_alat[0];
                $data['fk_mst_petani'] = json_encode($request->petani);
                $data['ket'] = $request->ket[0];
                $updatedata = MstAlat::find($id)->update($data); 
            }
        }elseif($jenis=='hortikultura'){
            $periode = $request->tahun[0].$request->bulan[0];
            $cek = MstHortikultura::where('fk_jenis_hortikultura',$request->jenis[0])->where('fk_desa',$request->desa[0])->where('periode',$periode)->where('id','<>',$id)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode/jenis pada desa ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi[0];
                $data['fk_kabupaten'] = $request->kabupaten[0];
                $data['fk_kecamatan'] = $request->kecamatan[0];
                $data['fk_desa'] = $request->desa[0];
                $data['fk_jenis_hortikultura'] = $request->jenis[0];
                $data['periode'] = $periode;
                $data['luas_panen'] = str_replace(',', '.', $request->luas_panen[0]);
                $data['produktifitas'] = str_replace(',', '.', $request->produktifitas[0]);
                $data['jumlah_produksi'] = str_replace(',', '.', $request->jumlah_produksi[0]);
                $data['fk_mst_petani'] = json_encode($request->petani);
                $data['ket'] = $request->ket[0];
                $updatedata = MstHortikultura::find($id)->update($data); 
            }
        }elseif($jenis=='kehutanan'){
            $periode = $request->tahun[0].$request->bulan[0];
            $cek = MstKehutanan::where('fk_jenis_kehutanan',$request->jenis[0])->where('fk_desa',$request->desa[0])->where('periode',$periode)->where('id','<>',$id)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode/jenis pada desa ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi[0];
                $data['fk_kabupaten'] = $request->kabupaten[0];
                $data['fk_kecamatan'] = $request->kecamatan[0];
                $data['fk_desa'] = $request->desa[0];
                $data['fk_jenis_kehutanan'] = $request->jenis[0];
                $data['periode'] = $periode;
                $data['luas'] = str_replace(',', '.', $request->luas[0]);
                $data['bibit'] = $request->bibit[0];
                $data['fk_mst_petani'] = json_encode($request->petani);
                $data['ket'] = $request->ket[0];
                $updatedata = MstKehutanan::find($id)->update($data); 
            }
        }elseif($jenis=='penggunaan'){
            $periode = $request->tahun[0].$request->bulan[0];
            $cek = MstPenggunaan::where('fk_jenis_penggunaan',$request->jenis[0])->where('fk_desa',$request->desa[0])->where('periode',$periode)->where('id','<>',$id)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode/jenis pada desa ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi[0];
                $data['fk_kabupaten'] = $request->kabupaten[0];
                $data['fk_kecamatan'] = $request->kecamatan[0];
                $data['fk_desa'] = $request->desa[0];
                $data['fk_jenis_penggunaan'] = $request->jenis[0];
                $data['periode'] = $periode;
                $data['luas'] = str_replace(',', '.', $request->luas[0]);
                $data['bibit'] = $request->bibit[0];
                $data['fk_mst_petani'] = json_encode($request->petani);
                $data['ket'] = $request->ket[0];
                $updatedata = MstPenggunaan::find($id)->update($data); 
            }
        }elseif($jenis=='tanamanpangan'){
            $periode = $request->tahun[0].$request->bulan[0];
            $cek = MstTanamanPangan::where('fk_jenis_tanaman_pangan',$request->jenis[0])->where('fk_desa',$request->desa[0])->where('periode',$periode)->where('id','<>',$id)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode/jenis pada desa ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi[0];
                $data['fk_kabupaten'] = $request->kabupaten[0];
                $data['fk_kecamatan'] = $request->kecamatan[0];
                $data['fk_desa'] = $request->desa[0];
                $data['fk_jenis_tanaman_pangan'] = $request->jenis[0];
                $data['periode'] = $periode;
                $data['luas_panen'] = str_replace(',', '.', $request->luas_panen[0]);
                $data['produktifitas'] = str_replace(',', '.', $request->produktifitas[0]);
                $data['jumlah_produksi'] = str_replace(',', '.', $request->jumlah_produksi[0]);
                $data['fk_mst_petani'] = json_encode($request->petani);
                $data['ket'] = $request->ket[0];
                $updatedata = MstTanamanPangan::find($id)->update($data); 
            }
        }elseif($jenis=='hewanternak'){
            $periode = $request->tahun[0].$request->bulan[0];
            $cek = MstHewanTernak::where('fk_jenis_hewan_ternak',$request->jenis[0])->where('fk_desa',$request->desa[0])->where('periode',$periode)->where('id','<>',$id)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode/jenis pada desa ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi[0];
                $data['fk_kabupaten'] = $request->kabupaten[0];
                $data['fk_kecamatan'] = $request->kecamatan[0];
                $data['fk_desa'] = $request->desa[0];
                $data['fk_jenis_hewan_ternak'] = $request->jenis[0];
                $data['jenis_kelamin'] = $request->jenis_kelamin[0];
                $data['periode'] = $periode;
                $data['jumlah_ternak'] = $request->jumlah_ternak[0];
                $data['fk_mst_petani'] = json_encode($request->petani);
                $data['ket'] = $request->ket[0];
                $updatedata = MstHewanTernak::find($id)->update($data); 
            }
        }elseif($jenis=='ikanlaut'){
            $periode = $request->tahun[0].$request->bulan[0];
            $cek = MstIkanLaut::where('fk_desa',$request->desa[0])->where('periode',$periode)->where('id','<>',$id)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode/jenis pada desa ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi[0];
                $data['fk_kabupaten'] = $request->kabupaten[0];
                $data['fk_kecamatan'] = $request->kecamatan[0];
                $data['fk_desa'] = $request->desa[0];
                $data['periode'] = $periode;
                $data['jumlah_produksi'] = str_replace(',', '.', $request->jumlah_produksi[0]);
                $data['nilai_produksi'] = $request->nilai_produksi[0];
                $data['fk_mst_petani'] = json_encode($request->petani);
                $data['ket'] = $request->ket[0];
                $updatedata = MstIkanLaut::find($id)->update($data); 
            }
        }elseif($jenis=='statusnelayan'){
            $periode = $request->tahun[0].$request->bulan[0];
            $cek = StatusNelayan::where('fk_desa',$request->desa[0])->where('periode',$periode)->where('id','<>',$id)->get();
            if(count($cek)>0){
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode/jenis pada desa ini sudah ada'
                ]);
            }else{
                $data['fk_provinsi'] = $request->provinsi[0];
                $data['fk_kabupaten'] = $request->kabupaten[0];
                $data['fk_kecamatan'] = $request->kecamatan[0];
                $data['fk_desa'] = $request->desa[0];
                $data['periode'] = $periode;
                $data['pemilik_rtp'] = $request->pemilik_rtp[0];
                $data['buruh_rbtp'] = $request->buruh_rbtp[0];
                $data['fk_mst_petani'] = json_encode($request->petani);
                $data['ket'] = $request->ket[0];
                $updatedata = StatusNelayan::find($id)->update($data); 
            }
        }

        if($updatedata){
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diubah'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali!'
            ]);
        }
    }

    public function destroy($jenis , $id)
    {
        $data['deleted_by'] = Auth::id();
        $data['deleted_at'] = Carbon::now()->toDateTimeString();

        if($jenis=='alat'){
            $updatedata = MstAlat::find($id)->update($data);
        }elseif($jenis=='hortikultura'){
            $updatedata = MstHortikultura::find($id)->update($data);
        }elseif($jenis=='kehutanan'){
            $updatedata = MstKehutanan::find($id)->update($data);
        }elseif($jenis=='penggunaan'){
            $updatedata = MstPenggunaan::find($id)->update($data);
        }elseif($jenis=='tanamanpangan'){
            $updatedata = MstTanamanPangan::find($id)->update($data);
        }elseif($jenis=='hewanternak'){
            $updatedata = MstHewanTernak::find($id)->update($data);
        }elseif($jenis=='ikanlaut'){
            $updatedata = MstIkanLaut::find($id)->update($data);
        }elseif($jenis=='statusnelayan'){
            $updatedata = StatusNelayan::find($id)->update($data);
        }

        return response()->json([   
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
