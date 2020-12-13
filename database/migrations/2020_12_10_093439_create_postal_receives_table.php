<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostalReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postal_receives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('ref_no');
            $table->string('address');
            $table->string('note');
            $table->string('from_title');
            $table->string('date');
            $table->string('doc')->nullable();
            $table->boolean('status')->default(1);
            $table->string('deleted_by')->nullable();
            $table->string('deleted_at')->nullable();
            $table->string('deleted_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postal_receives');
    }
}
