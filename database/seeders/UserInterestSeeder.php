<?php

namespace Database\Seeders;

use App\Models\Interest;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserInterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $interests = Interest::all();

            foreach($interests as $interest) {
                DB::table('user_interests')->insert([
                    'user_id' => $user->id,
                    'interest_id' => $interest->id,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
