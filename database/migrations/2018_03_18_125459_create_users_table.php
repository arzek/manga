<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manga', function (Blueprint $table) {
            $table->increments('id');
            $table->text('alt_name');
            $table->float('const_long',8,2);
            $table->integer('count_ch');
            $table->text('img');
            $table->json('mangaka');
            $table->integer('rating');
            $table->text('short_story');
            $table->text('status');
            $table->text('tags');
            $table->text('title_full');
            $table->text('trans_status');
            $table->json('translation_full');
            $table->text('type');
            $table->text('chapters');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
