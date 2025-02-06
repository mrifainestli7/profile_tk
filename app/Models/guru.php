<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guru';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pfp_path',  // Path foto profil
        'name',      // Nama guru
        'nuptk',     // Nomor Unik Pendidik dan Tenaga Kependidikan
        'status',    // Status (GTT atau GTY)
        'qualification',  // Kualifikasi pendidikan
    ];
}