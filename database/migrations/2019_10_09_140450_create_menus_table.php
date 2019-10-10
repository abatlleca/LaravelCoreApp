<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->string('route')->nullable();
            $table->string('icon')->nullable();
            $table->smallInteger('order')->default(0);
            $table->boolean('enabled')->default(1);
            $table->unsignedBigInteger('parent_id')->default(0);

            $table->string('role_name')->index();
            $table->foreign('role_name')->references('role_name')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('menus');
    }
}
