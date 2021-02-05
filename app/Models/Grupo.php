<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable=[
        'curso',
        'letra',
        'nombre',
        'tutor',
        'anyoescolar',
        'nivel',
        'verificado',
        'creador'
    ];

    /**
     * Devuelve el nivel que pertenece un grupo
     */
    public function nivelEstudios()
    {
        return $this->belongsTo(Nivel::class, 'nivel'); //nombre de la clave ajena en la tabla grupos
    }

    /**
     * Los usuarios en los que está matriculado un determinado grupo.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'matriculas', 'grupo', 'alumno'); //Matriculas es la tabla, y alumno y grupo las claves ajenas
    }
}
