<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezerwacja extends Model
{
    protected $fillable = [
        'datepicker', 'time', 'info', 'status'
    ];
}
