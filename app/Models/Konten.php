<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class Konten extends Model
{
    protected $removeViewsOnDelete = true;
    use Searchable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menusub()
    {
        return $this->belongsTo(Menusub::class);
    }

    public function searchableAs()
    {
        return 'kontens_index';
    }

    use HasFactory;
}
