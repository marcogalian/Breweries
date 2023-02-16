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
    public function up()
    {
        Schema::table('beers', function (Blueprint $table) {

            $table->foreignId('beertype_id')
                ->after('vol')
                ->nullable()
                ->default(1)
            
            // Estos tres medotodos de aqui lo que hacen es que cuando se borra o modifica un registro lo haga en cascada
                ->constrained('beertypes')

                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beers', function (Blueprint $table) {
            $table->dropForeign('beers_beertype_id_foreign');
        });
    }
};
