<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_keluar extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "barang_keluar";

    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
