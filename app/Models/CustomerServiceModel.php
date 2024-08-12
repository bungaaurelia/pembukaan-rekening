<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerServiceModel extends Model
{
    use HasFactory;

    protected $table = 'nasabah';

    protected $fillable = [
        'id_nasabah',
        'nama_nasabah',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pekerjaan',
        'nominal_setor',
        'updated_at',
        'created_at',
        'status',
        'id'
    ];
}
