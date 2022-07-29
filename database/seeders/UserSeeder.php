<?php

namespace Database\Seeders;

use App\Models\Kerja;
use App\Models\Senarai;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rasyidi Alwee',
            'email' => 'rasyidialwee@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('pass123!!'),
        ]);

        User::factory()
            ->has(Senarai::factory()
                ->has(Kerja::factory()
                    ->count(10))
                ->count(10))
            ->count(5)
            ->create();
    }
}
