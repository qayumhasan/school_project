<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneCallLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_call_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('date');
            $table->string('details')->nullable();
            $table->string('next_date')->nullable();
            $table->string('call_duration')->nullable();
            $table->string('note')->nullable();
            $table->string('call_type')->nullable();
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
        Schema::dropIfExists('phone_call_logs');
    }
}
