<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalUserSubServices extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'sub_service_id',
    ];
}
