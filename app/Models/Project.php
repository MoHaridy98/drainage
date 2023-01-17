<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table  = 'project';

    protected $fillable = [
        'id',
        'name',
        'acre',
        'carat',
        'share',
        'net_acre',
        'net_carat',
        'net_share',
        'total_cost',
        'created_at',
        'updated_at',
    ];

    public function pdate()
    {
        return $this->hasOne(Date::class , 'project_id');
    }
}
