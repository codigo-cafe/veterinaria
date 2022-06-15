<?php

namespace App\Http\Controllers;

use App\Http\Requests\HospitalizacionRequest;
use App\Models\Hospitalizacion;
use App\Models\Mascota;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HospitalizacionController extends Controller
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
            'field' => ['in:ficha_hosp,nom_masc,raza_masc,sexo_masc,color_masc,espe_masc,edad_masc'],
        ]);

        $query = Hospitalizacion::query()->with('mascota');

        if(request('search')) {
            $query->where('nom_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('raza_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('sexo_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('color_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('espe_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('edad_masc', 'LIKE', '%'.request('search').'%');
        }

        if(request()->has(['field', 'direction'])) {
            $query->join('mascotas', 'hospitalizaciones.id_masc', '=', 'mascotas.id_masc')
                ->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Admin/Hospitalizaciones/Index', [
            'hospitalizaciones' => $query->paginate(request('entries') ? request('entries') : 10)->withQueryString(),
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
        return Inertia::render('Admin/Hospitalizaciones/Create', [
            'mascotas' => Mascota::with('cliente')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HospitalizacionRequest $request)
    {
        Hospitalizacion::create($request->all());
        return redirect()->route('hospitalizaciones.index')->with('status', 'Hospitalización registrada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospitalizacion  $hospitalizacion
     * @return \Illuminate\Http\Response
     */
    public function show(Hospitalizacion $hospitalizacione)
    {
        return Inertia::render('Admin/Hospitalizaciones/Show', [
            'hospitalizacion' => $hospitalizacione->load(['mascota.cliente', 'mascota.imagenes']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospitalizacion  $hospitalizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospitalizacion $hospitalizacione)
    {
        return Inertia::render('Admin/Hospitalizaciones/Edit', [
            'mascotas' => Mascota::with('cliente')->get(),
            'hospitalizacion' => $hospitalizacione,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospitalizacion  $hospitalizacion
     * @return \Illuminate\Http\Response
     */
    public function update(HospitalizacionRequest $request, Hospitalizacion $hospitalizacione)
    {
        $hospitalizacione->update($request->all());
        return redirect()->route('hospitalizaciones.index')->with('status', 'Hospitalización modificada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospitalizacion  $hospitalizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospitalizacion $hospitalizacione)
    {
        $hospitalizacione->delete();
        return redirect()->route('hospitalizaciones.index')->with('status', 'Hospitalización eliminada correctamente.');
    }
}
