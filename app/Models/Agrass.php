<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agrass extends Model
{
    use HasFactory;

    protected $table  = 'agricultural_association';

    protected $fillable = [
        'id',
        'name',
        'region_id',
        'created_at',
        'updated_at',
    ];

}
