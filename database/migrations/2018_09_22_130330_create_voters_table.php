<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('classroom_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('access_code');
            $table->timestamps();

            $table->primary('id');
            $table->foreign('classroom_id')
                ->references('id')->on('classrooms')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voters');
    }
}
