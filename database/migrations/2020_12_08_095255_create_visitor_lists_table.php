<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('purpose');
            $table->string('name');
            $table->string('phone');
            $table->string('id_card')->nullable();
            $table->string('no_of_person')->nullable();
            $table->string('date')->nullable();
            $table->string('intime')->nullable();
            $table->string('out_time')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('visitor_lists');
    }
}
