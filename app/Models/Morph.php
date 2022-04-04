<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morph extends Model
{
    use HasFactory;
    protected $fillable = [
        'dummy','morphable_id','morphable_type'
    ];

    public function morphable(){
        return $this->morphTo();
    }
}
