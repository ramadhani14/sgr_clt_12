<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class StatusNelayanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menu = 'statusnelayan';
        $submenu="";
        $jenis = "statusnelayan";
        $datapetani = MstPetani::orderBy('id','desc')->get();
        $provinsi = MstProvinsi::all();
        $header="Status Nelayan";
        $data = StatusNelayan::orderBy('id','desc')->get();
        $data_param = [
            'menu','submenu','data','header','datapetani','provinsi','jenis'
        ];

        return view('master/statusnelayan')->with(compact($data_param));
    }
    public function store(Request $request, $jenis)
    {
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
        }

        return response()->json([   
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
