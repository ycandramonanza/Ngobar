<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function mentor(){
        return $this->belongsTo(mentor::class, 'mentor_id', 'id');
    }

    public function materikelas(){
        return $this->hasMany(materikelas::class, 'kelas_id', 'id');
    }

    
    public function updatematerikelas(){
        return $this->hasMany(updatematerikelas::class, 'kelas_id', 'id');
    }

    
}
