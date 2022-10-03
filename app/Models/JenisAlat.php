<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisAlat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "jenis_alat";
    protected $guarded = ["id"];
}
