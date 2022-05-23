<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencias extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_incidencia';

    protected $table = "incidencia";

    protected $fillable = ['id_incidencia', 'id_user', 'id_aula', 'create_date', 'update_date', 'close_date', 'title', 'description'];

    public $timestamps = false;
    
    public function obtenerIncidencias()
    {
        return Incidencias::all();
    }

    public function obtenerIncidenciaPorID($id_incidencia){
        return Incidencias::find($id_incidencia);
    }

    public function obtenerIncidenciaPorIDUser($id_user){
        return Incidencias::where('id_user',  $id_user)->get();
    }
}
