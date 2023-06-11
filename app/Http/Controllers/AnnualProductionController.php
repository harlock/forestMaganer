<?php

namespace App\Http\Controllers;

use App\Models\AnnualProduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AnnualProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = AnnualProduction::select(DB::raw("sale  as count "))
            ->pluck('count');

        $tonHarvest = AnnualProduction::select(DB::raw("ton_harvest  as count"))
            ->pluck('count');

        $months = AnnualProduction::select(DB::raw("Month(date_production ) as month"))
            ->whereYear('date_production', date('Y'))
            ->groupBy(DB::raw("Month(date_production)"))
            ->pluck('month');
        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $tonHarve) {
            $datas[$tonHarve] = $tonHarvest[$index];
        }
        $datass = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $sale) {
            $datass[$sale] = $sales[$index];
        }

        return view('livewire.orchards.produccion', compact('datas', 'datass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnnualProduction  $annualProduction
     * @return \Illuminate\Http\Response
     */
    public function show(AnnualProduction $annualProduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnnualProduction  $annualProduction
     * @return \Illuminate\Http\Response
     */
    public function edit(AnnualProduction $annualProduction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnnualProduction  $annualProduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnnualProduction $annualProduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnnualProduction  $annualProduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnnualProduction $annualProduction)
    {
        //
    }
}
