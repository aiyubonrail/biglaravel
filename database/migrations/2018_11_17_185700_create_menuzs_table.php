<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuzsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuz', function (Blueprint $table) {
            $table->increments('menu_id');
            $table->string('menu');
            $table->integer('id');
            $table->timestamps();
        });

        DB::table('menuz')->insert([
                'id' => '1',
                'menu_id' => '1',
                'menu' => 'Buah-buahan',
                'created_at' =>'2018-11-24 05:16:08',
                'updated_at' => '2018-11-24 05:16:08'
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menuz_controllers');
    }
}
