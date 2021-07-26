<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class updatematerikelas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kelas(){
        return $this->belongsTo(kelas::class, 'kelas_id', 'id');
    }

    public function materikelas(){
        return $this->belongsTo(materikelas::class, 'materi_id', 'id');
    }
}
