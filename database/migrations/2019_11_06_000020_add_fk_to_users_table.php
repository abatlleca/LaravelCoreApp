<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //Foreign keys for users
//            $table->string('role_name')->nullable()->index()->default('CUSTOMER');
//            $table->foreign('role_name')->references('role_name')->on('roles');

            $table->unsignedBigInteger('customer_id')->nullable()->index();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->dropForeign('customer_id');
        });
    }
}
