<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggaran extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
}
