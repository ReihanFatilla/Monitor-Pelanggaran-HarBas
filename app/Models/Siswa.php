<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $table = "siswa";

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
