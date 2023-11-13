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
        Schema::create('item_solicituds', function (Blueprint $table) {
            $table->integerIncrements('idItemSolicitud');
            $table->unsignedInteger('idSolicitud');
            $table->unsignedInteger('idItem');
            $table->unsignedMediumInteger('cantidad');
            $table->foreign('idSolicitud')->references('idSolicitud')->on('solicituds');
            $table->foreign('idItem')->references('idItem')->on('items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_solicituds');
    }
};
