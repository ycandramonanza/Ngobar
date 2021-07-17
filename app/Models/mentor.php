<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class mentor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function kelas(){
        return $this->hasMany(kelas::class, 'mentor_id', 'id');
    }
}
