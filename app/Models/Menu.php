<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function menusub()
    {
        return $this->hasMany(Menusub::class);
    }

    use HasFactory;
}
