<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;


use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function newUser($user){
        $newUser = new User();
        $newUser->email = $user->email;
        $newUser->name = $user->name;
        $newUser->password = Hash::make($user->password);
        $newUser->cell_phone_number = $user->cell_phone_number;
        $newUser->identification_card = $user->identification_card;
        $newUser->date_of_birth = $user->date_of_birth;
        $newUser->city_code = $user->city_code;
        $newUser->save();
        $newUser->assignRole('Users');
        return $newUser;
    }

    public function editUser($id, $user){
        $newUser = User::find($id);
        $newUser->email = $user->email;
        $newUser->name = $user->name;
        $newUser->date_of_birth = $user->date_of_birth;
        $newUser->city_code = $user->city_code;
        $newUser->update();
        return $newUser;
    }

    public function deleteUser($id){
        User::find($id)->delete();
    }
}
