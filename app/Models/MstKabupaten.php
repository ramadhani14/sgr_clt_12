<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstKabupaten extends Model
{
    use HasFactory;
    protected $table = "mst_kabupaten";
    protected $guarded = ["id"];
}
