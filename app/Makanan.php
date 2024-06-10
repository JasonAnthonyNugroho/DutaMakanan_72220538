<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    protected $table = 'makanan';

    protected $fillable = [
                        'nama_makanan',
                        'asal_daerah',
                        'gizi',
                        'kategori',
                        'expired',
                        'deskripsi'
                        ];
}
