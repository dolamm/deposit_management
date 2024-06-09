<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $table = 'caidat_hethong';
    protected $fillable = [
        'key',
        'tengiatri',
        'giatri',
        'mota',
    ];
}
