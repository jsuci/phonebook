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
        Schema::create('subscribers', function (Blueprint $table) {
            $table->string('lastname', 200);
            $table->string('firstname', 200);
            $table->string('middlename', 200);
            $table->string('address', 255);
            $table->char('gender', 1);
            $table->dateTime('createddatetime');
            $table->dateTime('deletedatetime')->nullable();
            $table->dateTime('updateddatetime');
            $table->boolean('deleted')->default(false);
            $table->id();
            $table->timestamps();

            // Add a unique index to the firstname, middlename, and lastname columns
            $table->unique(['lastname', 'firstname', 'middlename']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
};
