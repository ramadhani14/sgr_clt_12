<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstDesa extends Model
{
    use HasFactory;
    protected $table = "mst_desa";
    protected $guarded = ["id"];
}
