<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampleOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sample_orders', function (Blueprint $table) {
            $table->id();
            $table->string('po_no', 15);
            $table->dateTime('created_date');
            $table->dateTime('delivery_date');
            $table->string('status', 30);
            $table->unsignedBigInteger('last_modified_by_id');
            $table->unsignedBigInteger('created_by_id');
            $table->timestamps();

            $table->foreign('last_modified_by_id')->references('id')->on('users');
            $table->foreign('created_by_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sample_orders');
    }
}
