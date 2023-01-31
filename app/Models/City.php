<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table  = 'city';

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function city(){
        return $this->hasMany(Region::class ,'city_id');
    }
}
