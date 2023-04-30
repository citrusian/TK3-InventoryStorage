<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'Nama',
        'Deskripsi',
        'Jenis',
        'Stok',
        'Harga_Beli',
        'Harga_Jual',
        'image',
    ];
}
