<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenewalFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renewal_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('code_id')->constrained()->onDelete('cascade');
            $table->string('from_year');
            $table->string('to_year');
            $table->float('amount',8,2);
            $table->string('previous_year_rule');
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
        Schema::dropIfExists('renewal_fees');
    }
}
