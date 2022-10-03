<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusNelayan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "status_nelayan";
    protected $guarded = ["id"];

    public function kecamatan_r()
    {
        return $this->belongsTo(MstKecamatan::class, 'fk_kecamatan', 'id');
    }

    public function desa_r()
    {
        return $this->belongsTo(MstDesa::class, 'fk_desa', 'id');
    }
}
