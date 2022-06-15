<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtencionRequest;
use App\Models\Atencion;
use App\Models\Mascota;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AtencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        request()->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:id_aten,nom_masc,raza_masc,sexo_masc,color_masc,espe_masc,edad_masc'],
        ]);

        $query = Atencion::query()->with('mascota');

        if(request('search')) {
            $query->where('nom_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('raza_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('sexo_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('color_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('espe_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('edad_masc', 'LIKE', '%'.request('search').'%');
        }

        if(request()->has(['field', 'direction'])) {
            $query->join('mascotas', 'atenciones.id_masc', '=', 'mascotas.id_masc')
                ->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Admin/Atenciones/Index', [
            'atenciones' => $query->paginate(request('entries') ? request('entries') : 10)->withQueryString(),
            'filters' => request()->all(['entries', 'search', 'field', 'direction']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Atenciones/Create', [
            'mascotas' => Mascota::with('cliente')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtencionRequest $request)
    {
        Atencion::create($request->all());
        return redirect()->route('atenciones.index')->with('status', 'Atención registrada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */
    public function show(Atencion $atencione)
    {
        return Inertia::render('Admin/Atenciones/Show', [
            'atencion' => $atencione->load(['mascota.cliente', 'mascota.imagenes']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */
    public function edit(Atencion $atencione)
    {
        return Inertia::render('Admin/Atenciones/Edit', [
            'mascotas' => Mascota::with('cliente')->get(),
            'atencion' => $atencione,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */
    public function update(AtencionRequest $request, Atencion $atencione)
    {
        $atencione->update($request->all());
        return redirect()->route('atenciones.index')->with('status', 'Atención modificada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atencion $atencione)
    {
        $atencione->delete();
        return redirect()->route('atenciones.index')->with('status', 'Atención eliminada correctamente.');
    }
}
