<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branch';

    protected $fillable = [
        'branch_name',
        'address',
        'pic',
        'mobile_phone_number',
        'email_1',
        'email_2',
        'status',
    ];
}