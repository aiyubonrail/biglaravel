<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id');
            $table->string('submenu');
            $table->timestamps();
        });

        DB::table('sub_menus')->insert([
                'menu_id' => '1',
                'submenu' => 'Apel',
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
        Schema::dropIfExists('sub_menus');
    }
}
