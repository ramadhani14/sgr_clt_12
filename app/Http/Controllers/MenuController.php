<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use Carbon\Carbon;
use File;
use Auth;
use Illuminate\Support\Facades\Crypt;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menu = 'menu';
        $submenu='';
        $data = Menu::orderByRaw('CONVERT(posisi, SIGNED) asc')->get();
        $batasmenu = Menu::orderByRaw('CONVERT(posisi, SIGNED) desc')->first();

        if(!$batasmenu){
            $batasmenu = 1; 
        }else{
            $batasmenu = (int)$batasmenu->posisi+1;
            if($batasmenu>10){
                $batasmenu = 10;
            }
        }
        $data_param = [
            'menu','submenu','data','batasmenu'
        ];
        return view('master/menu')->with(compact($data_param));
    }
    public function store(Request $request)
    {
        $data['posisi'] = $request->posisi_add;
        $data['nama'] = $request->nama_add;
        $data['parent_menu'] = $request->parent_menu_add;
        $data['content'] = $request->content_add;

        $data['created_by'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        $createdata = Menu::create($data);
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
        $data['posisi'] = $request->posisi[0];
        $data['nama'] = $request->nama[0];
        $data['parent_menu'] = $request->parent_menu[0];
        $data['content'] = $request->content[0];

        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        $updatedata = Menu::find($id)->update($data);

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
        $updateData = Menu::find($id)->update($data);
        return response()->json([   
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
    public function content($id)
    {
        $menu = $id;
        $submenu='';
        $data = Menu::find($id);

        $data_param = [
            'menu','submenu','data'
        ];
        return view('master/content')->with(compact($data_param));
    }
}
