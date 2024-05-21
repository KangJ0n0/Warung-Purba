<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i <= 50; $i++) {
            \DB::table('accounts')->insert([
                'account_name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
                'account_pict' => $faker->image,
                'account_desc' => $faker->text,
                'role' => $faker->randomElement(['admin', 'user']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
