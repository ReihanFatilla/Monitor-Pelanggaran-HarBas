<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = "kategori";

    protected $guarded = [];

    public function pelanggarans() {
        return $this->hasMany(Pelanggaran::class, 'id_kategori', 'id');
    }
}
