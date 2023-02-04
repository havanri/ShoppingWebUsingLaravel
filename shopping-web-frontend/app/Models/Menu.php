<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = "menus";
    public function menuChildren(){
        return $this->hasMany(Menu::class,'parent_id');
    }
}
