<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MstPetani extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "mst_petani";
    protected $guarded = ["id"];
}
