<?php

use App\Http\Livewire\ChemicalElementController;
use App\Http\Livewire\ApplicationModeController;
use App\Http\Livewire\ApplicationController;
use App\Http\Livewire\DoseController;
use App\Http\Livewire\UnitController;
use App\Http\Livewire\TypePhotograpController;
use App\Http\Livewire\TypeTopographicController;
use App\Http\Livewire\TypeAvocadoController;
use App\Http\Livewire\TypeJobController;
use App\Http\Livewire\NutrientAnalysiController;

use App\Http\Livewire\ProductCategoryController;
use App\Http\Livewire\SupplyController;
use App\Http\Livewire\ActiveElementController;

use App\Http\Livewire\TypeSoilController;
use App\Http\Livewire\ClimateTypeController;

use App\Http\Livewire\OrchardController;

use App\Http\Livewire\WorkdayController;
use App\Http\Livewire\ActivitieController;
use App\Http\Livewire\RegistrationPhenofaseController;
use App\Http\Livewire\PhenophaseController;
use App\Http\Livewire\AnnualProductionController;
use App\Http\Livewire\SampleNutrientController;
use App\Http\Livewire\PhotographController;

use App\Http\Livewire\OrchardManagerController;
use App\Http\Livewire\OrchardFenofaseController;
use App\Http\Livewire\OrchardProductionController;
use App\Http\Livewire\OrchardPhotographController;
use App\Http\Livewire\CalendarController;
use App\Http\Livewire\OrchardCalendarController;

use App\Http\Livewire\UsuerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function (){


    Route::get('reset-password',function (){
        return view("auth.reset-password");
    });
    Route::get('profile',function (){
        return view("profile.show");
    });

    Route::get('/dashboard', OrchardController::class);

    Route::get('orchard', OrchardController::class)->name('orchard');

    Route::middleware(['canAccess'])->group(function () {
        Route::get('chemical_elements', ChemicalElementController::class);
        Route::get('application_modes', ApplicationModeController::class);

        Route::get('units', UnitController::class);
        Route::get('type_avocado', TypeAvocadoController::class);
        Route::get('type_photograps', TypePhotograpController::class);
        Route::get('type_topograps', TypeTopographicController::class);
        Route::get('type_jobs', TypeJobController::class);
        Route::get('product_categories', ProductCategoryController::class);
        Route::get('supplies_orchards', SupplyController::class);
        Route::get('active_elements', ActiveElementController::class);
        Route::get('type_soil', TypeSoilController::class);
        Route::get('climate_type', ClimateTypeController::class);
    });
    //Route::get('workday', WorkdayController::class);
    Route::get('application/{id}', ApplicationController::class)->name('aplicacion');
    Route::get('doses', DoseController::class);
    Route::get('activities', ActivitieController::class);
    Route::get('registro_phenophases', RegistrationPhenofaseController::class);
    Route::get('phenophase', PhenophaseController::class);
    Route::get('annual_production', AnnualProductionController::class);
    Route::get('sample_nutrients', SampleNutrientController::class);
    Route::get('nutrient_analysis', NutrientAnalysiController::class);
    Route::get('photographs', PhotographController::class);

    Route::get('usuario', UsuerController::class);

    Route::get('calendar/{id}', CalendarController::class)->name('calendario');

    Route::get('detalles/{id}', OrchardManagerController::class)->name('informacion');
    Route::get('fenofases/{id}', OrchardFenofaseController::class)->name('fenofase');
    Route::get('photographs/{id}', OrchardPhotographController::class)->name('photograph');
    Route::get('orchard_production/{id}',OrchardProductionController::class)->name('produccion');
    Route::get('workday/{id}', WorkdayController::class)->name('dias_trabajo');

    Route::get('orchard_calendar/', OrchardCalendarController::class);

});


Route::get("404",function(){
   return view("error.404");
});

