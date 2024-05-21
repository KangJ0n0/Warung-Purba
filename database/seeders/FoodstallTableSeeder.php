<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FoodstallTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $indonesianFoods = ['Nasi Goreng', 'Sate Ayam', 'Bakso', 'Rendang', 'Gado-Gado', 'Soto Ayam', 'Nasi Padang', 'Ayam Goreng', 'Mie Goreng', 'Sop Buntut'];

        for ($i = 0; $i <= 100; $i++) {
            \DB::table('foodstalls')->insert([
                'foodstall_name' => 'Warung ' . $indonesianFoods[array_rand($indonesianFoods)]. ' ' . $faker->name,
                'foodstall_location' => $faker->address,
                'foodstall_rating' => $faker->randomFloat(1, 0, 5),
                'foodstall_contact' => $faker->phoneNumber,
                'foodstall_pict' => $faker->image,
                'foodstall_desc' => $faker->text,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
