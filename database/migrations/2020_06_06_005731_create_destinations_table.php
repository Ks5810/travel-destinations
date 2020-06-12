<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('destinations', static function (Blueprint $table)
        {
            $table->id('id');
            $table->timestamps();
            $table->string('name');
            $table->boolean('visited')->nullable();
            $table->string('address')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();

            // Foreign key associated to id of owner
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinations');
    }
}
