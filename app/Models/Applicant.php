<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',  // Nama pwngguna
        'email', // Email pengguna
        'phone', // Nomor telepon pengguna
    ];
}
