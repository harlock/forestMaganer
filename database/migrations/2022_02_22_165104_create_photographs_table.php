<?php

use App\Models\Orchard;
use App\Models\TypePhotograph;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotographsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photographs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Orchard::class)->nullable()->constrained();
            $table->foreignIdFor(TypePhotograph::class)->nullable()->constrained();////CAMBIAR MODEL CONTROLADOR

            $table->string("path",250);
            $table->date('date');
            $table->string("note",250);

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
        Schema::dropIfExists('photographs');
    }
}
