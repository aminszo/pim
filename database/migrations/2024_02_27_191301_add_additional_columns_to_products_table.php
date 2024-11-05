<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('model')->nullable();
            $table->string('type')->nullable();
            $table->string('made_in')->nullable();
            $table->unsignedInteger('handsets')->nullable();
            $table->boolean('answer_system')->default(false);
            $table->boolean('base_dial_pad')->default(false);
            $table->boolean('bluetooth')->default(false);
            $table->unsignedInteger('lines')->nullable();
            $table->boolean('box')->default(false);
            $table->string('condition')->nullable();
            $table->string('grade')->nullable();
            $table->boolean('is_second_hand')->default(true);
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['model', 'type', 'made_in', 'handsets', 'answer_system', 'base_dial_pad', 'bluetooth', 'lines', 'box', 'condition', 'grade', 'is_second_hand','description']);
        });
    }
}

