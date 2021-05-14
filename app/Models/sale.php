<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'jobhigh', 'jobdesc', 'qualification', 'competencies', 'techskill', 'additional'
     
    ];

    protected $table = 'sale';
}