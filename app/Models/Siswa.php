<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $table = "siswa";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function pelanggaran(){
        return $this->hasMany(Siswa::class, 'id_siswa', 'id');
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
}
