<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectorWelcome extends Model
{
    use HasFactory;

    protected $table = 'director_welcome';

    protected $fillable = [
        'title_highlight',
        'content_1',
        'content_2',
        'content_3',
        'content_4',
        'director_name',
        'director_photo',
    ];
}