<?php

use App\Performance;
use Illuminate\Database\Seeder;

class PerformanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Performance::class, 10)->create();
    }
}
