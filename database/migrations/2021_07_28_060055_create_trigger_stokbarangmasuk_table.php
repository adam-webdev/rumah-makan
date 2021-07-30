<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerStokbarangmasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER update_stok_barangmasuk after INSERT ON barang_masuk
        FOR EACH ROW BEGIN
        UPDATE barang
        SET jumlah_barang = jumlah_barang + NEW.jumlah
        WHERE
        id = NEW.id;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger_stokbarangmasuk');
    }
}
