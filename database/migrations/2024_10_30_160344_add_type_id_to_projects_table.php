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
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('type_id')
                    ->nullable()
                    ->after('id')
                    ->constrained()
                    /*
                     Quando faccio l'update di un id di type, 
                     l'update viene applicato anche a tutto i projects che fanno riferimento a type.
                    */
                    ->onUpdate('cascade')
                    // Se una riga di di types viene eliminata il valore di type_id in projects viene impostato a null in questo caso(-)
                    ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
                $table->dropForeign(['type_id']);

                $table->dropColumn('type_id');
            
        });
    }
};
