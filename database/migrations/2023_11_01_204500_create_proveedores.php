<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->integerIncrements('idProveedor');
            $table->string('denominacion',50)->nullable('false');
           
           $table->string('correo',50)->nullable('false');
           $table->string('telefono',20)->nullable('false');
            $table->string('CUIT', 20)->nullable('false');
            $table->string('domicilio', 50)->nullable('false');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
