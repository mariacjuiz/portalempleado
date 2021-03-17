<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Vacation extends Model
{
    use HasFactory;

    protected $table = 'vacations';

    protected $casts = [
        'startdate' => 'date:d-m-Y',
        'enddate' => 'date:d-m-Y',
    ];



};


