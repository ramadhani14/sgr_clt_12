<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TableContent extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "table_content";
    protected $guarded = ["id"];
}
