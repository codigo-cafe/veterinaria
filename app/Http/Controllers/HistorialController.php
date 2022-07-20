<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HistorialController extends Controller
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
            $query->join('clientes', 'mascotas.id_clie', '=', 'clientes.id_clie')
                ->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Admin/Historias/Index', [
            'mascotas' => $query->paginate(request('entries') ? request('entries') : 10)->withQueryString(),
            'filters' => request()->all(['entries', 'search', 'field', 'direction']),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascota = Mascota::find($id);
        return Inertia::render('Admin/Historias/Show', [
            'mascota' => $mascota->load('cliente', 'imagenes', 'examenes', 'vacunas', 'hospitalizaciones', 'tratamientos.productos', 'atenciones', 'citas'),
        ]);
    }
}
