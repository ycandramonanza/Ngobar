<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class cvMentor extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'id';


    
    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
