<?php

use App\Models\Phenophase;
use App\Models\Orchard;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationPhenophasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_phenophases', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Phenophase::class)->nullable()->constrained();
            $table->foreignIdFor(Orchard::class)->nullable()->constrained();

            $table->date('date');
            $table->text("comments");

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
        Schema::dropIfExists('registration_phenophases');
    }
}
