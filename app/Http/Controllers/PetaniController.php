<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstPetani;
use App\Models\User;
use Carbon\Carbon;
use File;
use Auth;
use Illuminate\Support\Facades\Crypt;

class PetaniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menu = 'petani';
        $submenu='';
        $data = MstPetani::all();
        $data_param = [
            'menu','submenu','data'
        ];
        return view('master/petani')->with(compact($data_param));
    }
    public function store(Request $request)
    {
        $data['nik'] = $request->nik_add;
        $data['nama'] = $request->nama_add;
        $data['alamat'] = $request->alamat_add;
        $data['no_hp'] = $request->no_hp_add;

        $data['created_by'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        $createdata = MstPetani::create($data);
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

    public function update(Request $request, $id)
    {
        $data['nik'] = $request->nik[0];
        $data['nama'] = $request->nama[0];
        $data['alamat'] = $request->alamat[0];
        $data['no_hp'] = $request->no_hp[0];

        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        $updatedata = MstPetani::find($id)->update($data);

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

    public function destroy($id)
    {
        $data['deleted_by'] = Auth::id();
        $data['deleted_at'] = Carbon::now()->toDateTimeString();
        $updateData = MstPetani::find($id)->update($data);
        return response()->json([   
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
