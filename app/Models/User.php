<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cif',
        'name',
        'email',
        'password',
        'lowdate',
        'adress',
        'phone',
        'photo',
        'department'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Obtiene las nóminas de un usuario
     */
    // public function userSalaries()
    // {
    //     return $this->hasMany(UserSalary::class);
    // }

    // /**
    //  * Get the recipe that owns the tag.
    //  */
    // public function getActiveUsersAll()
    // {
    //     $users = User::where('lowdate', null)
    //     ->orderBy('id')
    //     ->take(10)
    //     ->get();
    //     // foreach (User::all() as $user) {
    //     //     echo $user->name;
    //     // }
    // }

//     public function getUser()
//     {
//         return Departament::addSelect(['depname' => User::all
//             ->whereColumn('destination_id', 'destinations.id')
//             ->orderByDesc('arrived_at')
//             ->limit(1)
//         ])->get();
//     }

     public function getUser($id)
     {
        $users = User::where('id', ($id))
        ->get();
     }


//     (Flight::all() as $flight)
 }
