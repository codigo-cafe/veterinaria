<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamenRequest;
use App\Models\Examen;
use App\Models\Mascota;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;
use DB;

class ExamenController extends Controller
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
            'field' => ['in:id_exa,nom_masc,raza_masc,sexo_masc,color_masc,espe_masc,edad_masc'],
        ]);

        $query = Examen::query()->with('mascota');

        if(request('search')) {
            $query->where('nom_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('raza_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('sexo_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('color_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('espe_masc', 'LIKE', '%'.request('search').'%')
                ->orwhere('edad_masc', 'LIKE', '%'.request('search').'%');
        }

        if(request()->has(['field', 'direction'])) {
            $query->join('mascotas', 'examenes.id_masc', '=', 'mascotas.id_masc')
                ->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Admin/Examenes/Index', [
            'examenes' => $query->paginate(request('entries') ? request('entries') : 10)->withQueryString(),
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
        return Inertia::render('Admin/Examenes/Create', [
            'mascotas' => Mascota::with('cliente')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamenRequest $request)
    {
        if ($request->id_masc) {
            foreach ($request->examenes as $key => $examen)
            {
                $url = md5(microtime()).'.jpg';
                $resized_image = Image::make($examen['imagen'])->widen(600)->limitColors(255)->stream('jpg', 100);
                Storage::put('public/'.$url, $resized_image);

                Examen::create(
                    [
                        'titu_exa' => $examen['titulo'],
                        'img_exa' => Storage::url($url),
                        'descrip_exa' => $examen['descripcion'],
                        'id_masc' => $request->id_masc,
                    ]
                );
            }
        }

        return redirect()->route('examenes.index')->with('status', 'Examen registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(Examen $examen)
    {
        return Inertia::render('Admin/Examenes/Show', [
            'examen' => $examen->load(['mascota.cliente', 'mascota.imagenes']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function edit(Examen $examen)
    {
        return Inertia::render('Admin/Examenes/Edit', [
            'mascotas' => Mascota::with('cliente')->get(),
            'examen' => $examen,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function update(ExamenRequest $request, Examen $examen)
    {
        $examen->update($request->all());
        return redirect()->route('examenes.index')->with('status', 'Examen modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examen $examen)
    {
        $examen->delete();
        return redirect()->route('examenes.index')->with('status', 'Examen eliminado correctamente.');
    }
}
