<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Cliente;
use App\Models\Mascota;
use App\Models\Imagen;
use Illuminate\Http\Request;
use App\Http\Requests\MascotaRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;

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
            $query->join('clientes', 'mascotas.id_clie', '=', 'clientes.id_clie')
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
        $mascota = Mascota::create($request->all());

        if ($request->hasFile('imagenes_masc'))
        {
            foreach ($request->file('imagenes_masc') as $key => $imagen)
            {
                $file = $imagen->store('public');
                $image = Image::make(Storage::get($file))
                    ->widen(600)
                    ->limitColors(255)
                    ->encode();

                Storage::put($file, (string) $image);

                Imagen::create([
                    'url_img' => Storage::url($file),
                    'id_masc' => $mascota->id_masc,
                ]);
            }
        }
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
            'mascota' => $mascota->load('cliente', 'imagenes'),
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
            'imagenes_mascota' => $mascota->imagenes()->get()->pluck('url_img'),
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
        if ($request->imagenes_masc_recovered)
        {
            $photos_to_delete = DB::table('imagenes')->whereNotIn('url_img', $request->imagenes_masc_recovered)->where('id_masc', '=', $mascota->id_masc)->get()->pluck('url_img');
            $photoPath = str_replace('storage', 'public', $photos_to_delete);
            Storage::delete(json_decode($photoPath,true));
            DB::table('imagenes')->whereNotIn('url_img', $request->imagenes_masc_recovered)->where('id_masc', '=', $mascota->id_masc)->delete();
        } else {
            $photos_to_delete = DB::table('imagenes')->where('id_masc', '=', $mascota->id_masc)->get()->pluck('url_img');

            $photoPath = str_replace('storage', 'public', $photos_to_delete);
            Storage::delete(json_decode($photoPath,true));
            DB::table('imagenes')->where('id_masc', '=', $mascota->id_masc)->delete();
        }

        if ($request->hasFile('imagenes_masc'))
        {
            foreach ($request->file('imagenes_masc') as $key => $imagen)
            {
                $file = $imagen->store('public');
                $image = Image::make(Storage::get($file))
                    ->widen(600)
                    ->limitColors(255)
                    ->encode();

                Storage::put($file, (string) $image);

                Imagen::create([
                    'url_img' => Storage::url($file),
                    'id_masc' => $mascota->id_masc,
                ]);
            }
        }
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
        $photos_to_delete = DB::table('imagenes')->where('id_masc', '=', $mascota->id_masc)->get()->pluck('url_img');
        $photoPath = str_replace('storage', 'public', $photos_to_delete);
        Storage::delete(json_decode($photoPath,true));
        DB::table('imagenes')->where('id_masc', '=', $mascota->id_masc)->delete();

        $mascota->delete();
        return redirect()->route('mascotas.index')->with('status', 'Mascota eliminada correctamente.');
    }
}
