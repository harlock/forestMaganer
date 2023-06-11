<?php

use App\Models\NutrientAnalysi;
use App\Models\Unit;
use App\Models\ChemicalElement;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampleNutrientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sample_nutrients', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NutrientAnalysi::class)->nullable()->constrained();
            $table->foreignIdFor(Unit::class)->nullable()->constrained();
            $table->foreignIdFor(ChemicalElement::class)->nullable()->constrained();

            $table->double("percentage",4,2);
            $table->double("lot",4,2);//Cantidad

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
        Schema::dropIfExists('sample_nutrients');
    }
}
