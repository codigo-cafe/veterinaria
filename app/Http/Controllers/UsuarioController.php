<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsuarioController extends Controller
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
            'field' => ['in:id,cedula_per,nom_per,ape_per'],
        ]);

        $query = User::query();

        if(request('search')) {
            $query->where('cedula_per', 'LIKE', '%'.request('search').'%')
                ->orwhere('nom_per', 'LIKE', '%'.request('search').'%')
                ->orwhere('ape_per', 'LIKE', '%'.request('search').'%');
        }

        if(request()->has(['field', 'direction'])) {
            $query->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Admin/Usuarios/Index', [
            'usuarios' => $query->paginate(request('entries') ? request('entries') : 10)->withQueryString(),
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
        return Inertia::render('Admin/Usuarios/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        User::create($request->all());
        return redirect()->route('usuarios.index')->with('status', 'Usuario registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return Inertia::render('Admin/Usuarios/Show', [
            'usuario' => $usuario,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        return Inertia::render('Admin/Usuarios/Edit', [
            'usuario' => $usuario,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, User $usuario)
    {
        $usuario->update($request->all());
        return redirect()->route('usuarios.index')->with('status', 'Usuario modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('status', 'Usuario eliminado correctamente.');
    }
}
