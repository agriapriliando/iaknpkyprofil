<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menusub extends Model
{    
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    use HasFactory;
}
