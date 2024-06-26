<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table      = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable   = [
        'user_image',
        'first_name',
        'middle_name',
        'last_name',
        'suffix_name',
        'birth_date',
        'gender_id',
        'address',
        'contact_number',
        'email_address',
        'role_id',
        'username', 
        'password'
    ];

    protected $hidden = ['password'];


    // Relationshipss------
    public function gender()
    {
    return $this->belongsTo(Gender :: class, 'gender_id');
    }

    public function role()
{
    return $this->belongsTo(Role::class, 'role_id');
}

}

