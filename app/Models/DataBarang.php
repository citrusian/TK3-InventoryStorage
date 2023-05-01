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
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    protected $appends = [
        'profile_photo_url',
    ];

    public function getHasAdmin()
    {
        return $this->attributes['idtype'];
    }










}
