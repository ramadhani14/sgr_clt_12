<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "menu";
    protected $guarded = ["id"];

    public function parent_menu_r()
    {
        return $this->belongsTo(Menu::class, 'parent_menu', 'id');
    }
}
