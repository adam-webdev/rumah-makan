<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";

    public function barang_keluar(){
        return $this->hasOne(Barang_keluar::class);
    }
    public function barang_masuk(){
        return $this->hasOne(Barang_masuk::class);
    }
}
