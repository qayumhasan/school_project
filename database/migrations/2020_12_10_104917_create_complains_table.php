<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('source');
            $table->string('complain_by');
            $table->string('phone');
            $table->string('date');
            $table->string('description')->nullable();
            $table->string('action_taken');
            $table->string('assingned');
            $table->text('note')->nullable();
            
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
        Schema::dropIfExists('complains');
    }
}
