<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    use HasFactory;

    protected $table = 'members_table';
    protected $guarded = [];

    public function wilaya()
    {
        return $this->belongsTo(WilayaModel::class, 'wilaya_id');
    }

    public function birthWilaya()
    {
        return $this->belongsTo(WilayaModel::class, 'birth_wilaya_id');
    }
}
