<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserType;
use App\Models\Note;
use App\Models\Trainee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'email'    => 'admin@admin.com',
            'password' => Hash::make('password'),
            'type'     => UserType::Admin,
        ]);

        Trainee::factory()->create([
            'user_id' => $admin->id
        ]);

        Note::factory(10)->create();

        $this->call(CoachSeeder::class);
        $this->call(PlanSeeder::class);
    }
}
