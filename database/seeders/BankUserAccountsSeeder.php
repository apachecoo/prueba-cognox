<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BankUserAccount;

class BankUserAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAccounts= [
            [
                'user_id' => 1,
                'account_number' => 11458963
            ],
            [
                'user_id' => 1,
                'account_number' => 1454545
            ],
            [
                'user_id' => 1,
                'account_number' => 145456
            ],
            [
                'user_id' => 1,
                'account_number' => 5564110
            ],
            [
                'user_id' => 1,
                'account_number' => 7778845
            ]
            
        ];

        foreach ($userAccounts as $key => $userAccount) {
            BankUserAccount::create($userAccount);
        }

    }
}
