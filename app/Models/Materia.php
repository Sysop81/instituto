<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    //Devuelve las notas de una materia
    public function notas(){
        return $this->HasMany(Nota::class, 'materia_id');
    }
}
