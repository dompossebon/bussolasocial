<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;

class FastEventTest extends TestCase
{
//    O banco de teste é iniciado pela classe StarTest e logo esvaziado e encerrado pela EndTest;
    public function testViewCalendar()
    {
        $user = new User(['name' => 'Possebon']);
        $this->be($user);
        $response = $this->get('admin/view-calendar');
        $response->assertStatus(200);
        $this->assertIsObject($response);
    }

    public function testFailViewCalendarNotMiddleware()
    {
        $response = $this->get('admin/view-calendar');
        $response->assertStatus(302);
        $this->assertIsObject($response);
    }

    public function testStore()
    {
        $request = [
            'id' => 1,
            'title' => 'Abelhinhaxyxy',
            'start' => '11:30:00',
            'end' => '13:00:00',
            'color' => '#e8f516',
            'manager' => 'Possebon',
        ];
        $user = new User(['name' => 'Possebon']);
        $this->be($user);
        $response = $this->post('admin/fast-event-store', $request);
        $response->assertStatus(200);
        $this->assertNotEmpty($response);
        $this->assertIsObject($response);
    }

    public function testFailEmptyStore()
    {
        $request = [];
        $response = $this->post('admin/fast-event-store', $request);
        $response->assertStatus(302); //Obtem falha e Redireciona
        $this->assertIsObject($response);
    }

    public function testFailStoreNotLogin()
    {
        $request = [];
        $response = $this->post('admin/fast-event-store', $request);
        $response->assertStatus(302); //Obtem falha(Não Logado) e Redireciona
        $this->assertIsObject($response);
    }

    public function testUpdate()
    {
        $request = [
            'id' => 1,
            'title' => 'AbelhinhaWWW',
            'start' => '11:30:00',
            'end' => '13:00:00',
            'color' => '#e8f516',
            'manager' => 'Possebon',
        ];

        $user = new User(['name' => 'Possebon']);
        $this->be($user);
        $response = $this->put('admin/fast-event-update', $request);
        $response->assertStatus(200);
        $this->assertNotEmpty($response);
        $this->assertIsObject($response);
    }

    public function testFailEmptyUpdate()
    {
        $request = [];
        $user = new User(['name' => 'Possebon']);
        $this->be($user);
        $response = $this->put('admin/fast-event-update', $request);
        $response->assertStatus(302); //Obtem falha(envia dados vazio) e Redireciona
        $this->assertIsObject($response);
    }

    public function testFailUpdateNotLogin()
    {
        $request = [
            'id' => 1,
            'title' => 'AbelhinhaWWW',
            'start' => '11:30:00',
            'end' => '13:00:00',
            'color' => '#e8f516',
            'manager' => 'Possebon',
        ];

        $response = $this->put('admin/fast-event-update', $request);
        $response->assertStatus(302);//Obtem falha(Não Logado) e Redireciona
        $this->assertNotEmpty($response);
        $this->assertIsObject($response);
    }


    public function testDestroy()
    {
        $request = ['id' => 1];
        $user = new User(['name' => 'Possebon']);
        $this->be($user);
        $response = $this->delete('admin/fast-event-destroy', $request);
        $response->assertStatus(200);
    }

    public function testFailDestroy()
    {
        $request = ['id' => '']; //Não Passando ID
        $user = new User(['name' => 'Possebon']);
        $this->be($user);
        $response = $this->delete('admin/fast-event-destroy', $request);
        $response->assertStatus(404); //Obtem falha (findOrFail) e Não Realiza o pedido
    }

    public function testFailDestroyNotLogin()
    {
        $request = ['id' => 1];

        $response = $this->delete('admin/fast-event-destroy', $request);
        $response->assertStatus(302);
    }

}
