<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrustedClient extends Model
{
    use HasFactory;

    protected $table = 'trusted_clients';

    protected $fillable = [
        'photo',
    ];
}