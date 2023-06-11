<?php

use App\Models\TypeAvocado;
use App\Models\TypeTopography;
use App\Models\TypeSoil;
use App\Models\ClimateType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrchardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orchards', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TypeAvocado::class)->nullable()->constrained();
            $table->foreignIdFor(TypeTopography::class)->nullable()->constrained();
            $table->foreignIdFor(TypeSoil::class)->nullable()->constrained();
            $table->foreignIdFor(ClimateType::class)->nullable()->constrained();
            $table->foreignIdFor(User::class)->nullable()->constrained();


            $table->string("name_orchard",250);
            $table->string("path_image",250)->nullable();
            $table->text("location_orchard");

            $table->point('point')->nullable();//GUARDAR COORDENADAS
            // Add a Polygon spatial data field named area
            $table->polygon('area')->nullable();//GUARDAR EL POLIGONO

            $table->double("altitude",7,2);//Altura sobre nivel del MAR en
            $table->double("surface",7,2);
            $table->integer("state");
            $table->year('creation_year');
            $table->integer("planting_density");
            $table->boolean('irrigation');

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
        Schema::dropIfExists('orchards');
    }
}
