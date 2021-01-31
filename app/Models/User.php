<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'role_id',
        'email',
        'password',
        'validated_by_admin'
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

    public function accepted()
    {
        return $this->validated_by_admin;
    }

    public function isInRole($role)
    {
        switch ($role) {
            case "admin":
                return $this->role_id == 1;
                break;
            case "moderator":
                return $this->role_id == 2;
                break;
            case "user":
                return $this->role_id == 3;
                break;
            
            default:
                return false;
                break;
        }
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
