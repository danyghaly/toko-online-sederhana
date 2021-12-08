<?php

namespace Database\Seeders;

use App\Models\User;
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
        $datetime = now()->toDateTimeString();
        $is_exists = User::where([
            ['name', 'Admin Tester'],
            ['email', 'admin@test.com'],
        ])->exists();

        if (! $is_exists) {
            $admin = new User([
                'name' => 'Admin Tester',
                'email' => 'admin@test.com',
                'password' => bcrypt('admin'),
                'admin' => true,
                'created_at' => $datetime,
                'updated_at' => $datetime]
            );
            $admin->save();
        }
    }
}
