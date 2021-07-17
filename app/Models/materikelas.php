<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materikelas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kelas(){
        return $this->belongsTo(kelas::class, 'kelas_id', 'id');
    }
}
