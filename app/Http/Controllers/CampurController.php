<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use App\Models\Template;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class CampurController extends Controller
{

    public function getparentmenu(Request $request)
    {
        $posisi = $request->val - 1;
        $databarudb = Menu::where('posisi',$posisi)->get(['id AS id', 'nama as text'])->toArray();

        return response()->json([
            'status' => true,
            'databarudb' => $databarudb
        ]);
    }
    
}
