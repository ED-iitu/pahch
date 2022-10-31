<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_tables', function (Blueprint $table) {
            $table->id();
            $table->integer('partner_id');
            $table->text('title');
            $table->string('phone');
            $table->string('email');
            $table->string('website');
            $table->text('address');
            $table->text('type');
            $table->text('city');
            $table->text('country');
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
        Schema::dropIfExists('partner_tables');
    }
}
