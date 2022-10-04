<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\MstPetani;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Hash;
use File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menu = "home";
        $submenu="";
        
        $user = User::all();
        $data_param = [
            'submenu','menu','user'
        ];

        return view('home/admin')->with(compact($data_param));
        
    }

    public function indextmp()
    {
        $menu = "template";
        $submenu="";
        $template = Template::all();
        $data_param = [
            'submenu','menu','template'
        ];

        return view('master/template')->with(compact($data_param));
    }

    public function updatetmp(Request $request, $id)
    {
        $data['nama'] = $request->nama[0];
        $data['email'] = $request->email[0];
        $data['no_telp'] = $request->no_telp[0];
        $data['no_wa'] = $request->no_wa[0];
        $data['alamat'] = $request->alamat[0];
        $data['kode_pos'] = $request->kode_pos[0];
        $data['facebook'] = $request->facebook[0];
        $data['twitter'] = $request->twitter[0];
        $data['youtube'] = $request->youtube[0];
        $data['linkedin'] = $request->linkedin[0];
        $data['instagram'] = $request->instagram[0];

        if($request->file("logo_besar")){
            if ($files = $request->file("logo_besar")[0]) {
                $dataOld = Template::find($id);
                File::delete($dataOld->logo_besar);
                $destinationPath = 'image/upload/logo/';
                $file = 'Logo_Besar_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
                $files->move($destinationPath, $file);
                $namafile = $destinationPath.$file;
                $data['logo_besar'] = $destinationPath.$file;
            }
        }

        if($request->file("logo_kecil")){
            if ($files = $request->file("logo_kecil")[0]) {
                $dataOld = Template::find($id);
                File::delete($dataOld->logo_kecil);
                $destinationPath = 'image/upload/logo/';
                $file = 'Logo_Kecil_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
                $files->move($destinationPath, $file);
                $namafile = $destinationPath.$file;
                $data['logo_kecil'] = $destinationPath.$file;
            }
        }

        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        $updatedata = Template::find($id)->update($data);

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

    // public function index()
    // {
    //     $menu = "master";
    //     $submenu="template";
    //     $template = Template::all();
    //     $data_param = [
    //         'submenu','menu','template'
    //     ];

    //     return view('master/template')->with(compact($data_param));
    // }
}
