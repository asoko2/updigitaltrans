<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role',
        'status',
        'merchant_name',
        'address',
        'description',
        'open_time',
        'close_time',
        'nik_number',
        'gallery_merchant',
        'address_merchant',
        'photo_ktp',
        'photo_user',
        'photo_usaha',
    ];
}