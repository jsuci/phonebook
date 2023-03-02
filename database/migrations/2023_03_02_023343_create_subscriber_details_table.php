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
        Schema::create('subscriber_details', function (Blueprint $table) {
            $table->unsignedBigInteger('headerid');
            $table->string('phoneno', 55);
            $table->string('provider', 55);
            $table->boolean('deleted')->default(false);
            $table->id();
            $table->timestamps();


            $table->foreign('headerid')
            ->references('id')
            ->on('subscribers')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriber_details');
    }
};
