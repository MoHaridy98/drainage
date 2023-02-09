<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefits extends Model
{
    use HasFactory;

    protected $table  = 'benefits';

    protected $fillable = [
        'Total_installment',
        'farmer_id',
        'project_id',
        'created_at',
        'updated_at',
    ];
    public function farmerName(){
        return $this->belongsTo(Farmer::class ,'farmer_id');
    }
}
