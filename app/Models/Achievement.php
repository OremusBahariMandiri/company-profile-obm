<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $table = 'achievements';

    protected $fillable = [
        'icon_title_1',
        'title_1',
        'description_1',
        'icon_title_2',
        'title_2',
        'description_2',
        'photo_1',
        'icon_title_3',
        'title_3',
        'description_3',
        'icon_title_4',
        'title_4',
        'description_4',
        'photo_2',
    ];
}