<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $language = Language::firstOrFail();

        DB::table('users')->insert([
            'name' => Str::random(10),
            'surname' => Str::random(10),
            'id_number' => $faker->numerify('#############'),
            'mobile_number' => $faker->numerify('##########'),
            'birth_date' => $faker->date(),
            'language_id' => $language->id,
            'email' => 'admin@propay.com',
            'password' => Hash::make('12345678'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $language = Language::firstOrFail();

        DB::table('users')->insert([
            'name' => Str::random(10),
            'surname' => Str::random(10),
            'id_number' => $faker->numerify('#############'),
            'mobile_number' => $faker->numerify('##########'),
            'birth_date' => $faker->date(),
            'language_id' => $language->id,
            'email' => 'test@propay.com',
            'password' => Hash::make('12345678'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

    }
}
