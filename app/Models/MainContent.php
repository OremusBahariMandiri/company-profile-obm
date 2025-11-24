<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainContent extends Model
{
    use HasFactory;

    protected $table = 'main_content';

    protected $fillable = [
        'title_1',
        'subtitle_1',
        'photo_1',
        'title_2',
        'subtitle_2',
        'photo_2',
        'title_3',
        'subtitle_3',
        'photo_3',
    ];
}