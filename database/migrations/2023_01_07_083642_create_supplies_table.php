<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ProductCategory;
use App\Models\MarkSupplie;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->string("name", 250);
            $table->integer("registry_number");
            $table->string("data_sheet", 250);
            $table->string("safety_sheet", 250);
            $table->foreignIdFor(\App\Models\Unit::class)->nullable()->constrained();
            $table->foreignIdFor(ProductCategory::class)->nullable()->constrained();
            $table->foreignIdFor(MarkSupplie::class)->nullable()->constrained();
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
        Schema::dropIfExists('supplies');
    }
}
