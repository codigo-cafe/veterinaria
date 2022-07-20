<?php

namespace App\Http\Controllers;

use App\Http\Requests\TratamientoRequest;
use App\Models\Mascota;
use App\Models\Producto;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;
use DB;

class TratamientoController extends Controller
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
            'field' => ['in:id_tra,nom_masc,raza_masc'],
        ]);

        $query = Tratamiento::query()->with('mascota');

        if(request('search')) {
            $query->whereHas('mascota', function($query) {
                $query->where('nom_masc', 'LIKE', '%' . request('search') . '%');
            })->orwhereHas('mascota', function($query) {
                $query->where('raza_masc', 'LIKE', '%' . request('search') . '%');
            });
        }

        if(request()->has(['field', 'direction'])) {
            $query->join('mascotas', 'tratamientos.id_masc', '=', 'mascotas.id_masc')
                ->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Admin/Tratamientos/Index', [
            'tratamientos' => $query->paginate(request('entries') ? request('entries') : 10)->withQueryString(),
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
        return Inertia::render('Admin/Tratamientos/Create', [
            'productos' => Producto::all(),
            'mascotas' => Mascota::with('cliente')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TratamientoRequest $request)
    {
        $tratamiento = Tratamiento::create($request->all());
        foreach ($request->productos as $key => $producto)
        {
            DB::table('producto_tratamiento')->insert(
                [
                    'id_pro' => $producto['id_pro'],
                    'id_tra' => $tratamiento['id_tra'],
                    'tiempo_tra' => $producto['tiempo'],
                    'dosis_tra' => $producto['dosis'],
                    'fecing_tra' => Carbon::createFromFormat('d/m/Y', $producto['fec_ini'])->format('Y-m-d'),
                    'fecfin_tra' => Carbon::createFromFormat('d/m/Y', $producto['fec_fin'])->format('Y-m-d'),
                ]
            );
        }
        return redirect()->route('tratamientos.index')->with('status', 'Tratamiento registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function show(Tratamiento $tratamiento)
    {
        return Inertia::render('Admin/Tratamientos/Show', [
            'tratamiento' => $tratamiento->load(['productos', 'mascota.cliente', 'mascota.imagenes']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Tratamiento $tratamiento)
    {
        return Inertia::render('Admin/Tratamientos/Edit', [
            'productos' => Producto::all(),
            'mascotas' => Mascota::with('cliente')->get(),
            'tratamiento' => $tratamiento->load('productos'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(TratamientoRequest $request, Tratamiento $tratamiento)
    {
        $tratamiento->update($request->all());
        $tratamiento->productos()->detach();

        foreach ($request->productos as $key => $producto)
        {
            DB::table('producto_tratamiento')->insert(
                [
                    'id_pro' => $producto['id_pro'],
                    'id_tra' => $tratamiento->id_tra,
                    'tiempo_tra' => $producto['tiempo'],
                    'dosis_tra' => $producto['dosis'],
                    'fecing_tra' => Carbon::createFromFormat('d/m/Y', $producto['fec_ini'])->format('Y-m-d'),
                    'fecfin_tra' => Carbon::createFromFormat('d/m/Y', $producto['fec_fin'])->format('Y-m-d'),
                ]
            );
        }
        return redirect()->route('tratamientos.index')->with('status', 'Tratamiento modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tratamiento $tratamiento)
    {
        $tratamiento->productos()->detach();
        $tratamiento->delete();
        return redirect()->route('tratamientos.index')->with('status', 'Tratamiento eliminado correctamente.');
    }
}
