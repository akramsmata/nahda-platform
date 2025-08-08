<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guarded = [];

    protected $hidden = [
        'password','remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // مساعد سريع لمعرفة إن المستخدم مشرف وطني/ولائي
    public function isNationalAdmin()
    {
        return $this->hasRole('national_admin');
    }

    public function isWilayaAdmin()
    {
        return $this->hasRole('wilaya_admin');
    }
}
