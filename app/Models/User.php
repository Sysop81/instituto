<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\DB;
use App\Models\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdministrator() {
        return $this->id == 1;
    }

    public function isProfesor(){ //pARA ALUMNO CON matricula o materiasmatriculadas
        //return  Materiaimpartida::where('docente', Auth::userId())->count() > 0; //Puede que la sintaxis falle
        return DB::table('materiasimpartidas')->where('docente', Auth::userId())->count() > 0; //Asi si no esta el modelo hecho
    }

    public function isAlumno(){ //pARA ALUMNO CON matricula o materiasmatriculadas
        //return  Materiaimpartida::where('docente', Auth::userId())->count() > 0; //Puede que la sintaxis falle
        return DB::table('matricula')->where('docente', Auth::userId())->count() > 0; //Asi si no esta el modelo hecho
    }

    /**
     * Devolver el centro que coordina.
     */
    public function centroCoordinado()
    {
        return $this->hasOne(Centro::class, 'coordinador');
    }

    /**
     * Los grupos en los que está matriculado un determinado alumno.
     */
    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'matriculas', 'alumno', 'grupo');
    }

    //Devuelve las notas de un usuario
    public function notas(){
        return $this->HasMany(Nota::class, 'user_id'); //Al ser user_ib no necesitariamos ponerlo
    }
}
