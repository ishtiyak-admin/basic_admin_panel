<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    protected $table    =   'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'first_name', 'last_name', 'email', 'mobile_number', 'facebook_id', 'old_username', 'old_email', 'old_mobile_number', 'old_facebook_id', 'dob', 'gender', 'role_id', 'image', 'address', 'location', 'lat', 'lng', 'status', 'is_delete', 'email_otp', 'email_verified', 'email_verified_at', 'password', 'email_noti', 'push_noti', 'device_type', 'device_token', 'terms', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
