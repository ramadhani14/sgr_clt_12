<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLevel;
use App\Models\Transaksi;
use Carbon\Carbon;
use File;
use Auth;

class UserListController extends Controller
{
    private $menubar;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menu = "user";
        $submenu="";
        $data = User::where('user_level','<>',1)->orderBy('name','asc')->get();
        $data_param = [
            'submenu','menu','data'
        ];

        return view('master/userlist')->with(compact($data_param));

    }
    public function listtransaksi($id)
    {
        $menu = "user";
        $submenu="";
        $data = Transaksi::where('fk_users',$id)->orderBy('created_at','desc')->get();
        $data_param = [
            'submenu','menu','data'
        ];

        return view('master/listtransaksi')->with(compact($data_param));

    }
    

    public function store(Request $request)
    {
        $data['username'] = $request->username_add;
        $data['name'] = $request->name_add;
        $data['email'] = $request->email_add;
        $data['jenis_kelamin'] = $request->jenis_kelamin_add;
        $data['alamat'] = $request->alamat_add;
        $data['user_level'] = $request->user_level_add;
        $data['password'] = bcrypt($request->username_add); 
        $data['is_active'] = 1;
        if ($request->ttl_add) {
            $data['ttl'] = Carbon::createFromFormat('d-m-Y',$request->ttl_add)->isoFormat('YYYY-MM-DD');
        }else{
            $data['ttl'] = null;
        }
        $data['created_by'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        $createData = User::create($data); 
            
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambah'
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $data['name'] = $request->name[0];
        $data['email'] = $request->email[0];
        $data['jenis_kelamin'] = $request->jenis_kelamin[0];
        $data['alamat'] = $request->alamat[0];
        $data['is_active'] = $request->is_active[0];
        if ($request->ttl[0]) {
            $data['ttl'] = Carbon::createFromFormat('d-m-Y',$request->ttl[0])->isoFormat('YYYY-MM-DD');
        }else{
            $data['ttl'] = null;
        }
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        User::find($id)->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diubah'
        ]);
    }

    public function updatestatuspembayaran(Request $request, $id)
    {
        $data['status'] = $request->status[0];
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        Transaksi::find($id)->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Status berhasil diperbarui'
        ]);
    }

    public function destroy($id)
    {
        $data['deleted_by'] = Auth::id();
        $data['deleted_at'] = Carbon::now()->toDateTimeString();
        $updateData = User::find($id)->update($data);
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }

    public function reset(Request $request)
    {
        $user = User::find($request->iduser);
        $dataUpdate['password'] = bcrypt($user->username); 
        $updatePwdUser = User::find($request->iduser)->update($dataUpdate);
        if($updatePwdUser){
            return response()->json([
                'status' => true,
                'message' => 'Password '.$user->username.' berhasil direset'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Password gagal direset, silahkan coba lagi!'
            ]);
        }

    }
}
