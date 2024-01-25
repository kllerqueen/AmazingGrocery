<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'role_id', 'gender_id', 'first_name', 'last_name', 'email', 'display_picture_link', 'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function roles(){
    //     return $this->hasOne(Role::class, 'role_id');
    // }

    // public function genders(){
    //     return $this->hasOne(Gender::class, 'gender_id');
    // }

    // public function orders(){
    //     return $this->hasMany(Order::class);
    // }
}
