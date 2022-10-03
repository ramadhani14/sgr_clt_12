<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisKehutanan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "jenis_kehutanan";
    protected $guarded = ["id"];
}
