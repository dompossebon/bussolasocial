<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
//    O banco de teste é iniciado pela classe StarTest e logo esvaziado e encerrado pela EndTest;
    public function testViewRegistrationForm()
    {
        $response = $this->get('/view-registration-form/1');
        $response->assertStatus(200);
        $this->assertIsObject($response);
    }

    public function testFailViewRegistrationForm()
    {
        $response = $this->get('/view-registration-form/');//Não enviando ID
        $response->assertStatus(404);
        $this->assertIsObject($response);
    }

    public function testListEvents()
    {
        $response = $this->get('/event-list');
        $response->assertStatus(200);
        $this->assertNotEmpty($response);
        $this->assertIsNotArray($response);
    }

    public function testStore()
    {
        $request = [
            'id' => 1,
            'fast_events_id' => 1,
            'title' => 'AbelhinhaXXXyyy',
            'start' => '2020-02-01 13:30:00',
            'end' => '2020-02-01 15:30:00',
            'color' => '#e8f516',
            'description' => 'Falar com Alunos',
            'status' => '0',
            'manager' => 'Possebon',
        ];
        $user = new User(['name' => 'Possebon']);
        $this->be($user);
        $response = $this->post('admin/event-store', $request);
        $response->assertStatus(200);
        $this->assertNotEmpty($response);
        $this->assertIsObject($response);
    }

    public function testFailEmptyStore()
    {
        $request = [];
        $user = new User(['name' => 'Possebon']);
        $this->be($user);
        $response = $this->post('admin/event-store', $request);
        $response->assertStatus(302); //Obtem falha e Redireciona
        $this->assertIsObject($response);
    }

    public function testFailStoreNotLogin()
    {
        $request = [
            'id' => 1,
            'fast_events_id' => 1,
            'title' => 'AbelhinhaXXXyyy',
            'start' => '2020-02-01 13:30:00',
            'end' => '2020-02-01 15:30:00',
            'color' => '#e8f516',
            'description' => 'Falar com Alunos',
            'status' => '0',
            'manager' => 'Possebon',
        ];

        $response = $this->post('admin/event-store', $request);
        $response->assertStatus(302); //Obtem falha(Não Logado) e Redireciona
        $this->assertIsObject($response);
    }

    public function testUpdate()
    {
        $request = [
            'id' => 1,
            'fast_events_id' => 1,
            'title' => 'AbelhinhaXXXyyy',
            'start' => '2020-02-01 13:30:00',
            'end' => '2020-02-01 15:30:00',
            'color' => '#e8f516',
            'description' => 'Falar com Alunos',
            'status' => '0',
            'manager' => 'Possebon',
        ];
        $user = new User(['name' => 'Possebon']);
        $this->be($user);
        $response = $this->put('admin/event-update', $request);
        $response->assertStatus(200);
        $this->assertNotEmpty($response);
        $this->assertIsObject($response);
    }

    public function testFailEmptyUpdate()
    {
        $request = [];
        $user = new User(['name' => 'Possebon']);
        $this->be($user);
        $response = $this->put('admin/event-update', $request);
        $response->assertStatus(302); //Obtem falha(Enviando dados vazios) e Redireciona
        $this->assertIsObject($response);
    }

    public function testFailUpdateNotLogin()
    {
        $request = [
            'id' => 1,
            'fast_events_id' => 1,
            'title' => 'AbelhinhaXXXyyy',
            'start' => '2020-02-01 13:30:00',
            'end' => '2020-02-01 15:30:00',
            'color' => '#e8f516',
            'description' => 'Falar com Alunos',
            'status' => '0',
            'manager' => 'Possebon',
        ];

        $response = $this->put('admin/event-update', $request);
        $response->assertStatus(302); //Obtem falha(Nao Logado) e Redireciona
        $this->assertIsObject($response);
    }

    public function testDestroy()
    {
        $request = ['id' => 1];
        $user = new User(['name' => 'Possebon']);
        $this->be($user);
        $response = $this->delete('admin/event-destroy', $request);
        $response->assertStatus(200);
    }

    public function testFailDestroy()
    {
        $request = ['id' => '']; //Não Passando ID
        $user = new User(['name' => 'Possebon']);
        $this->be($user);
        $response = $this->delete('admin/event-destroy', $request);
        $response->assertStatus(404); //Obtem falha (findOrFail) e Não Realiza o pedido
    }

    public function testFailDestroyNotLogin()
    {
        $request = ['id' => 1]; //Não Passando ID
        $response = $this->delete('admin/event-destroy', $request);
        $response->assertStatus(302); //Obtem falha (NãoLogado) e Redireciona
    }
}
