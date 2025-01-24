<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';
    protected $fillable = [
        'nama',
        'alamat',
        'nomor_telepon',
        'tanggal_lahir',
        'jenis_kelamin',
        'tinggi_badan',
        'berat_badan',
        'prestasi',
        'foto',
        'dokumen',
    ];

    public function pendaftar():HasMany
    {
        return $this->hasMany(Pendaftar::class);
    }
}
