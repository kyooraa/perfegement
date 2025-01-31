<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    use HasFactory;

    //Nama Tabel
    protected $table = 'perfmanage';

    //Kolom yang dapat diisi secara massal
    protected $fillable = [
        'date',
        'status_hadir',
        'jenis',
        'jam_datang',
        'jam_pulang',
        'j_approval',
        'j_agenda',
    ];
}
