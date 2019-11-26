<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title');
            $table->text('description');
            $table->string('origin');
            $table->unsignedTinyInteger('priority')->default(5);
            $table->boolean('isPrivate')->default(0);
            $table->boolean('closed')->default(0);

            //FK
            $table->unsignedBigInteger('status_id')->index();
            $table->foreign('status_id')->references('id')->on('status');

            $table->unsignedBigInteger('customer_id')->index();
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->unsignedBigInteger('creator_id')->index();
            $table->foreign('creator_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
