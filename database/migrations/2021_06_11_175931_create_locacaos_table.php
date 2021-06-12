<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locacaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
			$table->unsignedBigInteger('veiculo_id');
			$table->unsignedBigInteger('cliente_id');
			$table->dateTime('data_inicio');
			$table->dateTime('data_final');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locacaos');
    }
}
