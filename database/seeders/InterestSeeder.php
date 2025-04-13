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
            ['name' => Str::random(10), 'created_at' => date('Y-m-d H:i:s'),],
            ['name' => Str::random(10), 'created_at' => date('Y-m-d H:i:s'),],
            ['name' => Str::random(10), 'created_at' => date('Y-m-d H:i:s'),],
            ['name' => Str::random(10), 'created_at' => date('Y-m-d H:i:s'),],
            ['name' => Str::random(10), 'created_at' => date('Y-m-d H:i:s'),],
        ];

        DB::table('interests')->insert($interests);
    }
}
