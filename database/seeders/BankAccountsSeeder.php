<?php

namespace Database\Seeders;

use App\Models\BankAccounts;
use Illuminate\Database\Seeder;

class BankAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bankAccounts = [
            ['account_number' => 145456,
                'identification_document' => 1110519660,
                'balance' => 500000.00,
                'active' => 1],
            [
                'account_number' => 1454545,
                'identification_document' => 1110519660,
                'balance' => 500000.00,
                'active' => 1,
            ],
            [
                'account_number' => 11458963,
                'identification_document' => 1110519660,
                'balance' => 30000.00,
                'active' => 1,
            ],
            [
                'account_number' => 7778845,
                'identification_document' => 87455552,
                'balance' => 400000.00,
                'active' => 1,
            ],
            [
                'account_number' => 5564110,
                'identification_document' => 87455552,
                'balance' => 10000.00,
                'active' => 1,
            ],
        ];

        

        foreach ($bankAccounts as $key => $bankAccount) {
            
            BankAccounts::create($bankAccount);
        }

    }
}
