<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void */


    public function run() {
        User::truncate();
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '12345678',
                'is_admin' => '1',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => '134561548',
                'is_admin' => null,
            ],
            [
                'name' => 'Client',
                'email' => 'client@gmail.com',
                'password' => '1345645454',
                'is_admin' => null,
            ]
        ];

        foreach($users as $user)
        {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password'])
            ]);
        }

    }
}
