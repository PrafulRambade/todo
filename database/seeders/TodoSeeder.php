<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        foreach(range(1,10) as $values) {

            DB::table('todos')->insert([
                'title' => $faker->name,
                'detail' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
