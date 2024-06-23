<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompletedToBusinessModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_models', function (Blueprint $table) {
            $table->boolean('completed')->default(false)->after('revenue_streams'); // Ajout de la colonne completed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_models', function (Blueprint $table) {
            $table->dropColumn('completed');
        });
    }
}
