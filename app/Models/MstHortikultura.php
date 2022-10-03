<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MstHortikultura extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "mst_hortikultura";
    protected $guarded = ["id"];

    public function jenis_r()
    {
        return $this->belongsTo(JenisHortikultura::class, 'fk_jenis_hortikultura', 'id');
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
