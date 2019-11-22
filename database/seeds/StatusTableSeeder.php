<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Status::class)->create([
            'name' => 'New',
        ]);

        factory(Status::class)->create([
            'name' => 'Pending',
        ]);

        factory(Status::class)->create([
            'name' => 'Work in Progress',
        ]);

        factory(Status::class)->create([
            'name' => 'Waiting Feedback',
        ]);

        factory(Status::class)->create([
            'name' => 'Closed',
        ]);
    }
}
