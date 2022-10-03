<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisAlat;
use App\Models\JenisHortikultura;
use App\Models\JenisKehutanan;
use App\Models\JenisPenggunaan;
use App\Models\JenisTanamanPangan;
use App\Models\MstKomoditas;
use App\Models\JenisHewanTernak;
use App\Models\User;
use Carbon\Carbon;
use File;
use Auth;
use Illuminate\Support\Facades\Crypt;

class JenisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($jenis)
    {
        $menu = 'master';
        $datajenis = MstKomoditas::where('singkatan',$jenis)->first();
        $header=$datajenis->judul;
        $submenu=$datajenis->singkatan;
        if($datajenis->singkatan=='jnsalat'){
            $data = JenisAlat::orderBy('id','desc')->get();
        }elseif($datajenis->singkatan=='jnshortikultura'){
            $data = JenisHortikultura::orderBy('id','desc')->get();
        }elseif($datajenis->singkatan=='jnskehutanan'){
            $data = JenisKehutanan::orderBy('id','desc')->get();
        }elseif($datajenis->singkatan=='jnspenggunaan'){
            $data = JenisPenggunaan::orderBy('id','desc')->get();
        }elseif($datajenis->singkatan=='jnstanamanpangan'){
            $data = JenisTanamanPangan::orderBy('id','desc')->get();
        }elseif($datajenis->singkatan=='jnshewanternak'){
            $data = JenisHewanTernak::orderBy('id','desc')->get();
        }

        $data_param = [
            'menu','submenu','data','header','jenis'
        ];

        return view('master/jenis')->with(compact($data_param));
    }
    public function store(Request $request)
    {
        $jenis = $request->jenis;
        $data['judul'] = $request->judul_add;
        $data['ket'] = $request->ket_add;
        $data['created_by'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        
        if($jenis=='jnsalat'){
            $createdata = JenisAlat::create($data);
        }elseif($jenis=='jnshortikultura'){
            $createdata = JenisHortikultura::create($data);
        }elseif($jenis=='jnskehutanan'){
            $createdata = JenisKehutanan::create($data);
        }elseif($jenis=='jnspenggunaan'){
            $createdata = JenisPenggunaan::create($data);
        }elseif($jenis=='jnstanamanpangan'){
            $createdata = JenisTanamanPangan::create($data);
        }elseif($jenis=='jnshewanternak'){
            $data['kategori'] = $request->kategori_add;
            $createdata = JenisHewanTernak::create($data);
        }

        if($createdata){
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menambahkan data'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali!'
            ]);
        }
    }

    public function update(Request $request, $jenis, $id)
    {
        $data['judul'] = $request->judul[0];
        $data['ket'] = $request->ket[0];
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        if($jenis=='jnsalat'){
            $updatedata = JenisAlat::find($id)->update($data);
        }elseif($jenis=='jnshortikultura'){
            $updatedata = JenisHortikultura::find($id)->update($data);
        }elseif($jenis=='jnskehutanan'){
            $updatedata = JenisKehutanan::find($id)->update($data);
        }elseif($jenis=='jnspenggunaan'){
            $updatedata = JenisPenggunaan::find($id)->update($data);
        }elseif($jenis=='jnstanamanpangan'){
            $updatedata = JenisTanamanPangan::find($id)->update($data);
        }elseif($jenis=='jnshewanternak'){
            $data['kategori'] = $request->kategori[0];    
            $updatedata = JenisHewanTernak::find($id)->update($data);
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

        if($jenis=='jnsalat'){
            $updatedata = JenisAlat::find($id)->update($data);
        }elseif($jenis=='jnshortikultura'){
            $updatedata = JenisHortikultura::find($id)->update($data);
        }elseif($jenis=='jnskehutanan'){
            $updatedata = JenisKehutanan::find($id)->update($data);
        }elseif($jenis=='jnspenggunaan'){
            $updatedata = JenisPenggunaan::find($id)->update($data);
        }elseif($jenis=='jnstanamanpangan'){
            $updatedata = JenisTanamanPangan::find($id)->update($data);
        }elseif($jenis=='jnshewanternak'){
            $updatedata = JenisHewanTernak::find($id)->update($data);
        }

        return response()->json([   
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
