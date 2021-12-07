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
        $users = [
            ['name' => 'Admin Tester', 'email' => 'admin@test.com', 'password' => bcrypt('admin'), 'created_at' => $datetime, 'updated_at' => $datetime],
            ['name' => 'User Tester', 'email' => 'user@test.com', 'password' => bcrypt('user'), 'created_at' => $datetime, 'updated_at' => $datetime]
        ];
        $data = [];

        foreach ($users as $user) {
            $is_exists = User::where([
                ['name', $user['name']],
                ['email', $user['email']],
            ])->exists();

            if (! $is_exists) {
                $data[] = $user;
            }
        }

        if ($data) {
            User::insert($data);
        }
    }
}
