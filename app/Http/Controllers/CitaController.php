<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitaRequest;
use App\Models\Cita;
use App\Models\Mascota;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CitaController extends Controller
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
            'field' => ['in:id_cita,nom_masc,raza_masc,sexo_masc,color_masc,espe_masc,edad_masc'],
        ]);

        $query = Cita::query()->with('mascota.cliente');

        if(request('search')) {
            $query->where('nom_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('raza_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('sexo_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('color_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('espe_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('edad_masc', 'LIKE', '%'.request('search').'%');
        }

        if(request()->has(['field', 'direction'])) {
            $query->join('mascotas', 'citas.id_masc', '=', 'mascotas.id_masc')
                ->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Admin/Citas/Index', [
            'citas' => $query->paginate(request('entries') ? request('entries') : 10)->withQueryString(),
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
        return Inertia::render('Admin/Citas/Create', [
            'mascotas' => Mascota::with('cliente')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitaRequest $request)
    {
        Cita::create($request->all());
        return redirect()->route('citas.index')->with('status', 'Cita registrada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        return Inertia::render('Admin/Citas/Show', [
            'cita' => $cita->load(['mascota.cliente', 'mascota.imagenes']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        return Inertia::render('Admin/Citas/Edit', [
            'mascotas' => Mascota::with('cliente')->get(),
            'cita' => $cita,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(CitaRequest $request, Cita $cita)
    {
        $cita->update($request->all());
        return redirect()->route('citas.index')->with('status', 'Cita modificada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index')->with('status', 'Cita eliminada correctamente.');
    }
}
