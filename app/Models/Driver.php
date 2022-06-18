<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'drivers';

    protected $fillable = [
        'user_id', 'vehicle_type', 'vehicle_number',
        'sim_number', 'ktp_number', 'photo_user', 'birth_date', 'address',
        'brand', 'type', 'color',
        'photo_ktp', 'photo_sim', 'photo_stnk',
        'status', 'describe_verification', 'stnk_number'
    ];
}