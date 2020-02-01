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
                'title' => 'Reunião',
                'start' => '2020-01-12 21:30:00',
                'end' => '2020-01-13 21:30:00',
                'color' => '#c40233',
                'description' => 'Reuniao com clientes',
                'manager' => 'Prof Rita'
            ],
            [
                'title' => 'Ligar para Cliente',
                'start' => '2020-01-02',
                'end' => '2020-01-03',
                'color' => '#d8002b',
                'description' => 'Falar com Cliente',
                'manager' => 'Prof. xande'
            ],
            [
                'title' => 'encontro com fatima',
                'start' => '2020-01-15 10:30:00',
                'end' => '2020-01-16 11:30:00',
                'color' => '#03ffea',
                'description' => 'comprar aparelhos',
                'manager' => 'Prof. Zeca'
            ],

        ]);
    }
}
