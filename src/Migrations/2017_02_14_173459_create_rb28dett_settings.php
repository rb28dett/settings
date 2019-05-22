<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use RB28DETT\Settings\Models\Settings;

class CreateRB28DETTSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rb28dett_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('appname');
            $table->string('description');
            $table->string('keywords');
            $table->string('author');
            $table->timestamps();
        });

        Settings::create([
            'appname'     => 'RB28DETT',
            'description' => 'The modular laravel administration panel',
            'keywords'    => 'RB28DETT,Admin,Panel,CMS,Laravel,Modern,Developers',
            'author'      => 'Erik Campobadal, Aitor Riba',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rb28dett_settings');
    }
}
