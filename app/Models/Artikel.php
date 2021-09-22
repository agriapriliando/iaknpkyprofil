<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class Artikel extends Model
{
    protected $removeViewsOnDelete = true;
    use Searchable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    
    public function searchableAs()
    {
        return 'artikels_index';
    }

    use HasFactory;
}
