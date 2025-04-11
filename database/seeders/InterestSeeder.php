<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $interests = [
            ['name' => Str::random(10)],
            ['name' => Str::random(10)],
            ['name' => Str::random(10)],
            ['name' => Str::random(10)],
            ['name' => Str::random(10)],
        ];

        DB::table('interests')->insert($interests);
    }
}
