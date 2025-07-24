<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'subheading',
        'text',
        'background',
        'event_date',
        'event_time',
    ];
}
