<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table  = 'category';

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];
    public function Cat_Details()
    {
        return $this->hasMany('App\Models\Category_Details' , 'category_id','id');
    }



}
