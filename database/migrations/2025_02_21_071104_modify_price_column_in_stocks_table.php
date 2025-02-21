<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->decimal('price', 10)->change(); // Mengubah kolom price menjadi DECIMAL(10)
        });
    }

    public function down()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->change(); // Rollback ke DECIMAL(10,2) jika perlu
        });
    }
};
