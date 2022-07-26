<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testmonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'message',
        'path',
        'statut',
        'order'
    ];

    protected $guarded = [];
}
