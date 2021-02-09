<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Grupo;
use Laravel\Sanctum\Sanctum;

class GruposUsuarioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
   /* public function test_UserGrupos()
    {
        //Si enviamos sin autenticar, devuelve al login (302)
        $response = $this->get('/api/grupos'); //peticion a api grupos
        $response->assertStatus(302);

        //Autenticado, devuelve un (200)
        $user = User::find(1);  //Recoge al usuario 1
        Sanctum::actingAs($user); //Envia la cabecera de autorizacion

        $response = $this->get('/api/grupos'); //peticion a api grupos

        $response->assertStatus(200)->assertJsonStructure(['data' => [['curso', 'letra', 'nivel']]]); //Envia esta estructura de datos
    } */

    public function test_UserGrupos()
    {
        Sanctum::actingAs(
            User::factory() //Creamos un usuario con el factory
            ->hasAttached(
                Grupo::factory()->count(3)
            )
            ->create()
        );
        $response = $this->get('/api/grupos');
        $response->assertStatus(200)
        ->assertJsonStructure(['data' => [['curso', 'letra', 'nivel']]])->assertJsonCount(3, 'data');
    }
}
