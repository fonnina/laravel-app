<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Collection;
class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::factory(40)->create();






        //$coll= Collection::factory()->create();

    }
}
