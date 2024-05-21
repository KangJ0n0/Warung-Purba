<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $food = ['Nasi Goreng', 'Sate Ayam', 'Bakso', 'Rendang', 'Gado-Gado', 'Soto Ayam', 'Mie Ayam', 'Ayam Goreng', 'Mie Goreng', 'Sop Buntut', 'Nasi Padang', 'Nasi Uduk', 'Nasi Kuning', 'Nasi Liwet', 'Nasi Kebuli', 'Nasi Kari', 'Nasi Rawon', 'Nasi Rames', 'Nasi Pecel', 'Ayam Geprek','Ayam Bakar', 'Ayam Penyet', 'Ayam Kremes', 'Ayam Kecap', 'Ayam Rica-rica', 'Ayam Taliwang', 'Ayam Betutu', 'Ayam Kalasan', 'Ayam Pop', 'Ayam Panggang'];

        for ($i = 0; $i <= 100; $i++) {
            \DB::table('food')->insert([
                'food_name' => $food[array_rand($food)],
                'foodstall_id' => $faker->numberBetween(1,100),
                'food_price' => $faker->numberBetween(500,100000),
                'food_pict' => $faker->image,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
