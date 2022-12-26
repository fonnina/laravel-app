<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Designer;
class DesignerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designer::factory(8)->create();

    }
}
