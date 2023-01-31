<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table  = 'region';

    protected $fillable = [
        'id',
        'name',
        'city_id',
        'created_at',
        'updated_at',
    ];

    public function region(){
        return $this->hasMany(Agrass::class ,'region_id');
    }

    public function cityname(){
        return  $this->belongsTo(City::class ,'city_id');
    }
}
