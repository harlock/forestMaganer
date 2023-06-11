<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiveElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_elements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\ChemicalElement::class)->nullable()->constrained();
            $table->foreignIdFor(\App\Models\Supplie::class)->nullable()->constrained();
            $table->double("percentage",3,2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('active_elements');
    }
}
