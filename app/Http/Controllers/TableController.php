<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\TableContent;
use App\Models\User;
use Carbon\Carbon;
use File;
use Auth;
use Illuminate\Support\Facades\Crypt;

class TableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menu = 'table';
        $submenu='';
        $data = Table::orderBy('id','asc')->get();

        $data_param = [
            'menu','submenu','data'
        ];
        return view('master/table')->with(compact($data_param));
    }
    public function store(Request $request)
    {
        $cekjumlah = Table::all();
        if(count($cekjumlah)>=20){
            return response()->json([
                'status' => false,
                'message' => 'Maaf, kolom sudah mencapai batas maksimal !'
            ]);
        }else{
            $data['judul'] = $request->judul_add;
            $data['created_by'] = Auth::id();
            $data['created_at'] = Carbon::now()->toDateTimeString();
            $data['updated_by'] = Auth::id();
            $data['updated_at'] = Carbon::now()->toDateTimeString();
            $createdata = Table::create($data);
            if($createdata){
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil menambahkan data'
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal. Mohon coba kembali !'
                ]);
            }
        }
    }

    public function update(Request $request, $id)
    {
        $data['judul'] = $request->judul[0];
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        $updatedata = Table::find($id)->update($data);

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
        $updateData = Table::find($id)->update($data);
        return response()->json([   
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }

    public function indexc()
    {
        $menu = 'tablec';
        $submenu='';
        $kolom = Table::orderBy('id','asc')->get();
        $data = TableContent::orderBy('id','asc')->get();

        $data_param = [
            'menu','submenu','data','kolom'
        ];
        return view('master/tablec')->with(compact($data_param));
    }

    public function storec(Request $request)
    {
        $kolom = Table::orderBy('id','asc')->get();
        $jumlahkolom = count($kolom);
        for ($i=1; $i <=$jumlahkolom ; $i++) { 
            $value = "val_".$i."_add";
            $dataheader = 'val'.$i;
            $data[$dataheader] = $request->$value;
            $value = "a_".$i."_add";
            $data['a'.$i] = $request->$value;
        }
        $data['created_by'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        $createdata = TableContent::create($data);
        if($createdata){
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menambahkan data'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali !'
            ]);
        }
    }

    public function updatec(Request $request, $id)
    {
        $kolom = Table::orderBy('id','asc')->get();
        $jumlahkolom = count($kolom);
        for ($i=1; $i <=$jumlahkolom ; $i++) { 
            $value = "val_".$i;
            $dataheader = 'val'.$i;
            $data[$dataheader] = $request->$value[0];
            $value = "a_".$i;
            $data['a'.$i] = $request->$value[0];
        }
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        $updatedata = TableContent::find($id)->update($data);

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

    public function destroyc($id)
    {
        $data['deleted_by'] = Auth::id();
        $data['deleted_at'] = Carbon::now()->toDateTimeString();
        $updateData = TableContent::find($id)->update($data);
        return response()->json([   
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }

}
