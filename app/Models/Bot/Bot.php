<?php

namespace App\Models\Bots;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bots extends Model
{
    use HasFactory;
    protected $fillable = [
        'token',
        'name',
    ];



}
