<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MstPenggunaan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "mst_penggunaan";
    protected $guarded = ["id"];

    public function jenis_r()
    {
        return $this->belongsTo(JenisPenggunaan::class, 'fk_jenis_penggunaan', 'id');
    }

    public function kecamatan_r()
    {
        return $this->belongsTo(MstKecamatan::class, 'fk_kecamatan', 'id');
    }

    public function desa_r()
    {
        return $this->belongsTo(MstDesa::class, 'fk_desa', 'id');
    }
}
