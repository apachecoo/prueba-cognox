<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userTest= [
            'id' => 1,
            'name' => 'Albert Pacheco Ospitia',
            'email' => 'apachecoo110@gmail.com',
            'email_verified_at' => null,
            'password' => '$2y$10$ib89FJsj9VgA23NXc9A9jOAjlluDIKE7sQiE37I6.dneS9qhWTNU2',
            'remember_token' => null,
            'identification_document' => 1110519660
        ];
        User::create($userTest);
    }
}
