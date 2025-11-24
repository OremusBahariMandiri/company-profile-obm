<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory;

    protected $table = 'our_team';

    protected $fillable = [
        'photo_1',
        'title_photo_1',
        'subtitle_photo_1',
        'photo_2',
        'title_photo_2',
        'subtitle_photo_2',
        'photo_3',
        'title_photo_3',
        'subtitle_photo_3',
    ];
}