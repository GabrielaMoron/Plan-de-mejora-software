<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actor extends Model
{
    protected $fillable = [
    'first_name',
    'last_name'
    ];
    use HasFactory;
}
