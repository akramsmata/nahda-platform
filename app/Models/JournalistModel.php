<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalistModel extends Model
{
    use HasFactory;

    protected $table = 'journalists_table';
    protected $guarded = [];

    public function wilaya()
    {
        return $this->belongsTo(WilayaModel::class, 'wilaya_id');
    }
}
