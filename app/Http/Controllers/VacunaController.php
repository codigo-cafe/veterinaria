<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacunaRequest;
use App\Models\Mascota;
use App\Models\Vacuna;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VacunaController extends Controller
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
            'field' => ['in:id_vac,nom_masc,raza_masc,sexo_masc,color_masc,espe_masc,edad_masc'],
        ]);

        $query = Vacuna::query()->with('mascota.cliente');

        if(request('search')) {
            $query->where('nom_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('raza_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('sexo_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('color_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('espe_masc', 'LIKE', '%'.request('search').'%');
        }

        if(request()->has(['field', 'direction'])) {
            $query->join('mascotas', 'vacunas.id_masc', '=', 'mascotas.id_masc')
                ->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Admin/Vacunas/Index', [
            'vacunas' => $query->paginate(request('entries') ? request('entries') : 10)->withQueryString(),
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
        return Inertia::render('Admin/Vacunas/Create', [
            'mascotas' => Mascota::with('cliente')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacunaRequest $request)
    {
        Vacuna::create($request->all());
        return redirect()->route('vacunas.index')->with('status', 'Vacuna registrada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function show(Vacuna $vacuna)
    {
        return Inertia::render('Admin/Vacunas/Show', [
            'vacuna' => $vacuna->load(['mascota.cliente', 'mascota.imagenes']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacuna $vacuna)
    {
        return Inertia::render('Admin/Vacunas/Edit', [
            'mascotas' => Mascota::with('cliente')->get(),
            'vacuna' => $vacuna,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function update(VacunaRequest $request, Vacuna $vacuna)
    {
        $vacuna->update($request->all());
        return redirect()->route('vacunas.index')->with('status', 'Vacuna modificada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacuna $vacuna)
    {
        $vacuna->delete();
        return redirect()->route('vacunas.index')->with('status', 'Vacuna eliminada correctamente.');
    }
}
