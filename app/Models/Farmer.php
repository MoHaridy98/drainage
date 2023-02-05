<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $table  = 'farmer';

    protected $fillable = [
        'id',
        'name',
        'acre',
        'carat',
        'share',
        'association_id',
        'created_at',
        'updated_at',
    ];

    public function farmerAgr(){
        return $this->belongsTo(agrass::class ,'association_id');
    }
}
