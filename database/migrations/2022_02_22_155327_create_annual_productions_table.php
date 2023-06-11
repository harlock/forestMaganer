<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Orchard;

class CreateAnnualProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annual_productions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Orchard::class)->nullable()->constrained();

            $table->double("ton_harvest");
            $table->date('date_production');
            $table->double("sale");
            $table->double("damage_percentage");

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
        Schema::dropIfExists('annual_productions');
    }
}
