<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $table = 'careers';

    protected $fillable = [
        'careers_name',
        'description',
        'position',
        'working_area',
        'spesification_1',
        'spesification_2',
        'spesification_3',
        'spesification_4',
        'spesification_5',
        'spesification_6',
        'spesification_7',
        'spesification_8',
        'spesification_9',
        'spesification_10',
        'photo',
        'start_date',
        'end_date',
        'sallary',
        'status',
        'contact_phone',
        'contact_email',
    ];
}