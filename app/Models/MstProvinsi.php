<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstProvinsi extends Model
{
    use HasFactory;
    protected $table = "mst_provinsi";
    protected $guarded = ["id"];
}
