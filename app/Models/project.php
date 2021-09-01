<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\project;

class project extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'description' , 'finished' ];
}
