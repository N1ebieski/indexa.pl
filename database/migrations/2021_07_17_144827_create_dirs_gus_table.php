<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirsGusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dirs_gus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('dir_id')->unsigned()->index();
            $table->timestamp('attempted_at')->nullable();
            $table->timestamps();

            $table->foreign('dir_id')
                ->references('id')
                ->on('dirs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dirs_gus');
    }
}
