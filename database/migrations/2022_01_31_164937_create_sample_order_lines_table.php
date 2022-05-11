<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampleOrderLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sample_order_lines', function (Blueprint $table) {
            $table->id();
            $table->string('part_code', 30);
            $table->string('part_description', 100);
            $table->date('created_date');
            $table->date('delivery_date');
            $table->string('status', 30);
            $table->unsignedBigInteger('sample_order_id');
            $table->unsignedBigInteger('last_modified_by_id');
            $table->unsignedBigInteger('created_by_id');
            $table->timestamps();

            $table->foreign('sample_order_id')->references('id')->on('sample_orders');
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
        Schema::dropIfExists('sample_order_lines');
    }
}
