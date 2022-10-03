<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisHortikultura extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "jenis_hortikultura";
    protected $guarded = ["id"];
}
