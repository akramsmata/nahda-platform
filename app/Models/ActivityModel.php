<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityModel extends Model
{
    use HasFactory;

    protected $table = 'activities_table';
    protected $guarded = [];

    public function creator()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function registrations()
    {
        return $this->hasMany(ActivityRegistrationModel::class, 'activity_id');
    }
}
