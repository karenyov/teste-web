<?php

use App\Fabricante;
use Illuminate\Database\Seeder;

class FabricantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Fabricante::class, 10)->create();
    }
}
