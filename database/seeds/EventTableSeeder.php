<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('events')->insert([
            [
                'fast_events_id' => 1,
                'title' => 'Abelhinha',
                'start' => '2020-02-05 13:30:00',
                'end' => '2020-02-05 15:30:00',
                'color' => '#e8f516',
                'description' => 'Aula de Natação',
                'status' => '0',
                'manager' => 'Possebon'
            ],
            [
                'fast_events_id' => 1,
                'title' => 'Abelhinha',
                'start' => '2020-02-02 13:30:00',
                'end' => '2020-02-02 15:30:00',
                'color' => '#e8f516',
                'description' => 'Falar com Alunos',
                'status' => '0',
                'manager' => 'Possebon'
            ],
            [
                'fast_events_id' => 3,
                'title' => 'As Branquelas',
                'start' => '2020-02-10 10:30:00',
                'end' => '2020-02-10 11:30:00',
                'color' => '#e50ae4',
                'description' => 'comprar livros',
                'status' => '0',
                'manager' => 'Tatiana'
            ],
            [
                'fast_events_id' => 3,
                'title' => 'As Branquelas',
                'start' => '2020-02-14 10:30:00',
                'end' => '2020-02-14 11:30:00',
                'color' => '#e50ae4',
                'description' => 'comprar livros',
                'status' => '0',
                'manager' => 'Tatiana'
            ],

        ]);
    }
}
