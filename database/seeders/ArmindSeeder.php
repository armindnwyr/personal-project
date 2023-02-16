<?php

namespace Database\Seeders;

use App\Models\armind;
use Illuminate\Database\Seeder;

class ArmindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        armind::factory()->count(10)->create();
    }
}
