<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstProvinsi;
use App\Models\MstKabupaten;
use App\Models\MstKecamatan;
use App\Models\MstDesa;
use App\Models\User;
use App\Models\Slider;
use App\Models\VideoMst;
use App\Models\Template;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Auth;
use App\Mail\RegisterEmail;
use App\Mail\RegisterEmailAwal;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class CampurController extends Controller
{
    public function getKabupaten(Request $request)
    {
        $kabupaten = MstKabupaten::where('fk_provinsi',$request->valProvinsi)->get(['id AS id', 'nama as text'])->toArray();

        return response()->json([
            'status' => true,
            'kabupaten' => $kabupaten
        ]);
    }
    public function getKecamatan(Request $request)
    {
        $kecamatan = MstKecamatan::where('fk_kabupaten',$request->valKab)->get(['id AS id', 'nama as text'])->toArray();

        return response()->json([
            'status' => true,
            'kecamatan' => $kecamatan
        ]);
    }

    public function getDesa(Request $request)
    {
        $desa = MstDesa::where('fk_kecamatan',$request->valKec)->get(['id AS id', 'nama as text'])->toArray();

        return response()->json([
            'status' => true,
            'desa' => $desa
        ]);
    }
    
}
