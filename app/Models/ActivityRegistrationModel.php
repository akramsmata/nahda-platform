<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityRegistrationModel extends Model
{
    use HasFactory;

    protected $table = 'activity_registrations_table';
    protected $guarded = [];

    public function activity()
    {
        return $this->belongsTo(ActivityModel::class, 'activity_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function member()
    {
        return $this->belongsTo(\App\Models\MemberModel::class, 'member_id');
    }
}
