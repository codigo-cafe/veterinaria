<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Cliente;
use App\Models\Mascota;
use Illuminate\Http\Request;
use App\Http\Requests\MascotaRequest;

class MascotaController extends Controller
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
            'field' => ['in:id_masc,cedula_clie,nom_clie,ape_clie,nom_masc'],
        ]);

        $query = Mascota::query()->with('cliente');

        if(request('search')) {
            $query->whereHas('cliente', function($query) {
                $query->where('cedula_clie', 'LIKE', '%' . request('search') . '%');
            })->orwhereHas('cliente', function($query) {
                $query->where('nom_clie', 'LIKE', '%' . request('search') . '%');
            })->orwhereHas('cliente', function($query) {
                $query->where('ape_clie', 'LIKE', '%' . request('search') . '%');
            })->orwhere('nom_masc', 'LIKE', '%' . request('search') . '%');
        }

        if(request()->has(['field', 'direction'])) {
            $query->join('clientes', 'mascotas.id_masc', '=', 'clientes.id_clie')
                ->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Admin/Mascotas/Index', [
            'mascotas' => $query->paginate(request('entries') ? request('entries') : 10)->withQueryString(),
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
        return Inertia::render('Admin/Mascotas/Create', [
            'clientes' => Cliente::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MascotaRequest $request)
    {
        Mascota::create($request->all());
        return redirect()->route('mascotas.index')->with('status', 'Mascota registrada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show(Mascota $mascota)
    {
        return Inertia::render('Admin/Mascotas/Show', [
            'mascota' => $mascota->load('cliente'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascota $mascota)
    {
        return Inertia::render('Admin/Mascotas/Edit', [
            'clientes' => Cliente::all(),
            'mascota' => $mascota,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(MascotaRequest $request, Mascota $mascota)
    {
        $mascota->update($request->all());
        return redirect()->route('mascotas.index')->with('status', 'Mascota modificada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
        return redirect()->route('mascotas.index')->with('status', 'Mascota eliminada correctamente.');
    }
}
