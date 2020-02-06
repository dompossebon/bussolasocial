<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FastEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('fast_events')->insert([
            [
                'title' => 'TurmaDoPossebon-I',
                'start' => '11:30:00',
                'end' => '13:00:00',
                'color' => '#e8f516',
                'manager' => 'Possebon',
            ],
            [
                'title' => 'TurmaDaAngela',
                'start' => '10:30:00',
                'end' => '11:00:00',
                'color' => '#e50ae4',
                'manager' => 'Angela'
            ],
            [
                'title' => 'TurmaDoPossebon-II',
                'start' => '18:30:00',
                'end' => '20:00:00',
                'color' => '#d8002b',
                'manager' => 'Possebon'
            ],

        ]);
    }
}
