<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Details extends Model
{
    use HasFactory;
    protected $table  = 'category_details';

    protected $fillable = [
        'id',
        'category_id',
        'project_name',
        'description',
        'totall_cost',
        'cost',
        'date',
        'state',
        'created_at',
        'updated_at',
    ];

    public function project_cat()
    {
       return $this->belongsTo('App\Models\Category', 'id' ,'category_id');
    }
}
