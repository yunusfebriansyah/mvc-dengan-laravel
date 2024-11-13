<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $events =  [
            [
                'title' => 'Konser Band Se-Lampung',
                'description' => 'Ini adalah konser termewah dan termegah se-lampung!!!!',
                'date' => '2024-10-27 19:00:00',
                'location' => 'Stadion Sumpah Pemuda, Bandar Lampung',
                'organizer_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Konser KPU Lampung Tengah',
                'description' => 'Ini adalah konser deni caknan!!!!',
                'date' => '2024-08-27 15:00:00',
                'location' => 'Lapangan Tanggulangin, Punggur',
                'organizer_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        Event::insert($events);

    }
}
