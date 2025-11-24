<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurActivity extends Model
{
    use HasFactory;

    protected $table = 'our_activities';

    protected $fillable = [
        'photo',
        'title',
        'category',
    ];
}