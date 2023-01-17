<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $table  = 'date';

    protected $fillable = [
        'id',
        'excution',
        'area_initial',
        'area_final',
        'tax_initial',
        'tax_final',
        'opposition_start',
        'opposition_end',
        'enclose_start',
        'enclose_end',
        'view_start',
        'view_end',
        'end',
        'project_id',
        'created_at',
        'updated_at',
    ];
}
