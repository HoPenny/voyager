<?php

namespace Database\Seeders;

use App\Models\Cgy;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CgySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Cgy::truncate();
        $faker = Factory::create('zh_TW');
        // for ($i = 1; $i <= 10; $i++) {
        //     Cgy::create(['title' => $faker->sentence, 'enabled' => $faker->randomElement([true, false]), 'enabled_at' => Carbon::createFromFormat('Y-m-d', $faker->date)->now()->addDays(rand(1,20)), 'sort' => $faker->randomElement([0, 1, 2, 3, 4, 5])]);
        // }
        Cgy::factory()->times(100)->create();
    }
}
