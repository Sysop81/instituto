<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class CentroCoordinadoUsuarioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_centroCoordinado()
    {

        //Autenticado, devuelve un (200)
        $user = User::find(1);  //Recoge al usuario 1
        Sanctum::actingAs($user); //Envia la cabecera de autorizacion

        $response = $this->get('/api/miCentro'); //peticion a api, centro coordinado por un usuario

        //$response->assertStatus(200)->assertJsonFragment(['id' => 1]);
        $response->assertStatus(200)->assertJsonStructure(['data' => ['id', 'codigo','nombre', 'coordinador']]);
    }
}
