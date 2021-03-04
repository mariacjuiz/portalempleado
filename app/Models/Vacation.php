<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Vacation extends Model
{
    use HasFactory;

    protected $fillable = ["startdate", "enddate", "user_id", "validate"];

    //Cuando se crea un registro y no se esté ejecutando desde un terminal,
    //se vincula el nuevo registro al usuario registrado.
    protected static function boot() {
        parent::boot();
        self::creating(function ($table) {
            if ( ! app()->runningInConsole()) {
                $table->user_id = auth()->id();
            }

        });
    }

    //Definimos la relacion de las vacaciones con el usuario
    public function user() {
        return $this->belongsTo(User::class);
    }

};
