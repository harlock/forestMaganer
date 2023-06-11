<?php

namespace App\Http\Controllers;

use App\Models\Orchard;
use Illuminate\Http\Request;

/**
 * Class OrchardController
 * @package App\Http\Controllers
 */
class OrchardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orchards = Orchard::paginate();

        return view('orchard.index', compact('orchards'))
            ->with('i', (request()->input('page', 1) - 1) * $orchards->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orchard = new Orchard();
        return view('orchard.create', compact('orchard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Orchard::$rules);

        $orchard = Orchard::create($request->all());

        return redirect()->route('orchards.index')
            ->with('success', 'HUERTO CREADO EXISTOSAMENTE');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orchard = Orchard::find($id);

        return view('orchard.show', compact('orchard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orchard = Orchard::find($id);

        return view('orchard.edit', compact('orchard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Orchard $orchard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orchard $orchard)
    {
        request()->validate(Orchard::$rules);

        $orchard->update($request->all());

        return redirect()->route('orchards.index')
            ->with('success', 'HUERTO ACTUALIZADO EXISTOSAMENTE');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $orchard = Orchard::find($id)->delete();

        return redirect()->route('orchards.index')
            ->with('success', 'HUERTO ELIMINADO EXITOSAMENTE');
    }
}
