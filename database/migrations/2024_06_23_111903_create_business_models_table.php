<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('key_partnerships')->nullable();
            $table->text('key_activities')->nullable();
            $table->text('key_resources')->nullable();
            $table->text('value_propositions')->nullable();
            $table->text('customer_relationships')->nullable();
            $table->text('customer_segments')->nullable();
            $table->text('channels')->nullable();
            $table->text('cost_structure')->nullable();
            $table->text('revenue_streams')->nullable();
            $table->boolean('completed')->default(false); // Ajout de la colonne completed
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_models');
    }
}
