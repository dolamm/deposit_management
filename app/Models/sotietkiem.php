<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sotietkiem extends Model
{
    use HasFactory;
    protected $table = 'sotietkiem';
    const CREATED_AT = 'ngaymoso';
}
