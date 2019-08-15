<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KriditPaket extends Model
{
    protected $fillable = ['kode', 'harga_cash', 'uang_muka', 'jumlah_cicilan', 'bunga', 'nilai_cicilan'];
    public $timestamps = true;
}
