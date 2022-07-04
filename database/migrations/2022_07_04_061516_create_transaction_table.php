<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trasaction', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id');

            $table->float('total_price')->default(0);
            $table->float('shiping_price')->default(0);
            $table->string('status')->default('PENDING');

            $table->string('payment')->default('MANUAL');

            $table->softDeletes();
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
        Schema::dropIfExists('trasaction');
    }
}
