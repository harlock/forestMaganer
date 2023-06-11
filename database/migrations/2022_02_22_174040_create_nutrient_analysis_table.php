<?php
use App\Models\Orchard;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutrientAnalysisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrient_analysis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Orchard::class)->nullable()->constrained();
            $table->date("date_sample");
            $table->string("path",250);
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
        Schema::dropIfExists('nutrient_analysis');
    }
}
