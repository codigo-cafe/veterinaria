<?php

namespace App\Http\Controllers;

use App\Http\Requests\VentaRequest;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class VentaController extends Controller
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
            'field' => ['in:id_ven,cedula_clie,nom_clie,ape_clie,total_ven'],
        ]);

        $query = Venta::query()->with('cliente');

        if(request('search')) {
            $query->whereHas('cliente', function($query) {
                $query->where('cedula_clie', 'LIKE', '%' . request('search') . '%');
            })->orwhereHas('cliente', function($query) {
                $query->where('nom_clie', 'LIKE', '%' . request('search') . '%');
            })->orwhereHas('cliente', function($query) {
                $query->where('ape_clie', 'LIKE', '%' . request('search') . '%');
            })->orwhere('total', 'LIKE', '%' . request('search') . '%');
        }

        if(request()->has(['field', 'direction'])) {
            $query->join('clientes', 'ventas.id_clie', '=', 'clientes.id_clie')
                ->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Admin/Ventas/Index', [
            'ventas' => $query->paginate(request('entries') ? request('entries') : 10)->withQueryString(),
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
        return Inertia::render('Admin/Ventas/Create', [
            'productos' => Producto::all(),
            'clientes' => Cliente::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaRequest $request)
    {
        $venta = Venta::create($request->all());
        foreach ($request->productos as $key => $producto)
        {
            DB::table('producto_venta')->insert(
                [
                    'id_pro' => $producto['id_pro'],
                    'id_ven' => $venta['id_ven'],
                    'cant_ven' => $producto['cantidad'],
                    'precio_pro' => $producto['precio_pro'],
                ]
            );
        }
        return redirect()->route('ventas.index')->with('status', 'Venta registrada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
