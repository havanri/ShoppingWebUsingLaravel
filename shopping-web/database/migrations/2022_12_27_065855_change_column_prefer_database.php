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
        //delete foreign key
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    
        // drop the actual columns
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        //create customers table
        Schema::create('customers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('username')->nullable();
            $table->timestamps();
        });   
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
