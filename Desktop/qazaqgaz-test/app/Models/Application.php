<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'full_name', 'email', 'subject', 'category', 'priority', 'message', 'status', 'deadline'
    ];
}
