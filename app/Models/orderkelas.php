<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderkelas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kelas(){
        return $this->belongsTo(kelas::class, 'kelas_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

}
