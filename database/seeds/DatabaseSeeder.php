<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(MarcasTableSeeder::class);
        $this->call(FabricantesTableSeeder::class);
        $this->call(ProdutosTableSeeder::class);
        $this->call(PerformanceTableSeeder::class);

        Eloquent::reguard();
    }
}
