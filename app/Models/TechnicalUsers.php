<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalUsers extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phoneNumber',
        'password',
        'city',
        'mainService',
        'subServicesList',
        'bankName',
        'statementNumber',
        'address',
        'address_latitude',
        'address_longitude',
        'profileImage',
        'residenceImage',
        'Approved'
    ];
}
