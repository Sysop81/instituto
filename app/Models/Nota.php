<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'materia_id',
        'evaluacion',
        'nota'
    ];

    //Devuelve el usuario relacionado con la fila de la tabla nota, belong to en singular. por eso se pone user o materia en los metodos, porque solo devuelven una fila, si devolvieran mas iria en plural
    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    //Devuelve la materia relacionada con la fila de la tabla nota
    public function materia(){
        return $this->belongsTo(Materia::class, "materia_id");
    }
}
