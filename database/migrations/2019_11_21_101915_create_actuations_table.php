<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActuationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actuations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('description');
            $table->string('origin');
            $table->boolean('isPrivate')->default(0);

            //FK
            $table->unsignedBigInteger('creator_id')->index();
            $table->foreign('creator_id')->references('id')->on('users');

            $table->unsignedBigInteger('ticket_id')->index();
            $table->foreign('ticket_id')->references('id')->on('tickets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actuations');
    }
}
