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
                'title' => 'Abelhinha',
                'start' => '11:30:00',
                'end' => '13:00:00',
                'color' => '#e8f516'
            ],
            [
                'title' => 'Lobinhos',
                'start' => '18:30:00',
                'end' => '20:00:00',
                'color' => '#d8002b'
            ],
            [
                'title' => 'As Branquelas',
                'start' => '10:30:00',
                'end' => '11:00:00',
                'color' => '#03ffea'
            ],


        ]);
    }
}
