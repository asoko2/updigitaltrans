<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = 'kontak_kami';
    protected $fillable = [
        'phone', 'address', 'description', 'name'
    ];
}