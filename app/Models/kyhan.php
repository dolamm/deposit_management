<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kyhan extends Model
{
    use HasFactory;
    protected $table = 'kyhan';
    const CREATED_AT = 'ngaytao';
    const UPDATED_AT = 'ngaycapnhat';
}
