<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Incidencias;
use App\Models\Aulas;

class IncidenceController extends Controller
{
    protected $incidencias;

    public function __construct(Incidencias $incidencias)
    {
        $this->incidencias = $incidencias;
    }

    public function index()
    {
        $data['incidencias'] = $this->incidencias->obtenerIncidencias();
        $data['aulas'] = Aulas::all();
        return view('incidences.listIncidences', ['data' => $data]);
    }

    public function openIncidences($id_user)
    {
        $data['incidencias'] = $this->incidencias->obtenerIncidenciaPorIDUser($id_user);
        $data['aulas'] = Aulas::all();
        return view('incidences.listIncidences', ['data' => $data]);
    }

    public function newIncidence()
    {
        $data['aulas'] = Aulas::all();
        return view('incidences.newIncidence', ['data' => $data]);
    }

    public function storeIncidence(Request $request)
    {
        $incidencia = new Incidencias($request->all());
        $incidencia->save();
        return redirect()->action([IncidenceController::class, 'index']); // Cambiar direccionamiento.
    }

    public function infoIncidence($id_incidencia)
    {
        $data['incidencia'] = $this->incidencias->obtenerIncidenciaPorID($id_incidencia);
        $data['aulas'] = Aulas::all();
        return view('incidences.infoIncidence', ['data' => $data]);
    }

    public function wipIncidence()
    {
        return view('incidences.wip'); // Work In Progress
    }
}
