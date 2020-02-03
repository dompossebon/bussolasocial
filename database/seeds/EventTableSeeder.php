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
                'start' => '2020-02-12 21:30:00',
                'end' => '2020-02-13 21:30:00',
                'color' => '#c40233',
                'description' => 'Aula de Natação',
                'status' => '0',
                'manager' => 'Possebon'
            ],
            [
                'fast_events_id' => 1,
                'title' => 'Abelhinha',
                'start' => '2020-02-02 13:30:00',
                'end' => '2020-02-03 14:30:00',
                'color' => '#d8002b',
                'description' => 'Falar com Alunos',
                'status' => '0',
                'manager' => 'Possebon'
            ],
            [
                'fast_events_id' => 3,
                'title' => 'As Branquelas',
                'start' => '2020-02-15 10:30:00',
                'end' => '2020-02-16 11:30:00',
                'color' => '#03ffea',
                'description' => 'comprar livros',
                'status' => '0',
                'manager' => 'Tatiana'
            ],

        ]);
    }
}
