<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Room;
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
        // --- Create SUper Admin User ---
        $admin = User::create([
            'name'     => 'Super Admin',
            'email'    => 'superadmin@moh.gov.my',
            'password' => Hash::make('password'),
            'is_super' => true,
            'is_admin' => true,
        ]);

        // --- Create Admin User ---
        $admin = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@moh.gov.my',
            'password' => Hash::make('password'),
            'is_super' => false,
            'is_admin' => true,
        ]);

        // --- Create Regular Users ---
        $demoEmail = config('app.demo_user_email');

        $user1 = User::create([
            'name'              => 'Test User 1',
            'email'             => $demoEmail,
            'password'          => Hash::make('password'),
            'is_super'          => false,
            'is_admin'          => false,
            'is_demo'           => true,
            'email_verified_at' => now(),
        ]);

        $user2 = User::create([
            'name'     => 'John Doe',
            'email'    => 'johndoe@moh.gov.my',
            'password' => Hash::make('password'),
            'is_super' => false,
            'is_admin' => false,
        ]);

        // --- Create Rooms ---
        $this->call([
            RoomSeeder::class,
        ]);

        // --- Create Bookings ---
        $this->call([
            BookingSeeder::class,
        ]);
    }
}

