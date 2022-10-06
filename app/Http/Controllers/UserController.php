<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use Carbon\Carbon;
use File;
use Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function kinerja()
    {
        $menu = 'kinerja';
        $submenu='';
        $data = Menu::all();
        $data_param = [
            'menu','submenu','data'
        ];
        return view('user/kinerja')->with(compact($data_param));
    }

    public function kinerjadtl($id)
    {
        $menu = $id;
        $submenu='';
        $data = Menu::find($id);

        $data_param = [
            'menu','submenu','data'
        ];
        return view('user/kinerjadtl')->with(compact($data_param));
    }
}
