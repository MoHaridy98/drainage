<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;
    protected $table  = 'installment';

    protected $fillable = [
        'id',
        'date',
        'amount',
        'project_id',
        'farmer_id',
        'created_at',
        'updated_at',
    ];
    public function farName(){
        return $this->belongsTo(Farmer::class ,'farmer_id');
    }
    public function proName(){
        return $this->belongsTo(Project::class ,'project_id');
    }
}
