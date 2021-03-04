<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ["depname", "depuserID"];

    //definimos la relacion de departamento usuario por la FKUserID
    public function user(){
        return $this->belongsTo(User::class);
    }

}

