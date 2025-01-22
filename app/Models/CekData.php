<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CekData extends Model
{
    use HasFactory;

    
protected $fillable=['catatan','status_seleksi','pendaftar_id'];

public function pendaftar():BelongsTo
{
    return $this->belongsTo(pendaftar::class);
}

}

