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
        Schema::table('events', function (Blueprint $table) {
            //add chave estrangeira a usuario id
            //o constrained diz que essa lógica  ta atrelada a outra tabela
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            //para apagar os registros atrelados ao usuario
            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }
};
