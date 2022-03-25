<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table("codes", function (Blueprint $table)
        {
            $table->foreignId("user_id");
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table("codes", function (Blueprint $table)
        {
            $table->dropForeign("codes_user_id_foreign");
            $table->dropColumn("user_id");
        });
    }
};
