<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tables1 extends Model
{
    protected $table = 'tables1';
    protected $fillable = [
        'test',
        'name',
        'content',
    ];
}
