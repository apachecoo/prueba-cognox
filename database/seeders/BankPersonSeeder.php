<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BankPerson;

class BankPersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bankPersons= [
            ['id' => 1,
            'identification_document' => 1110519660,
            'names' => 'Albert',
            'surnames' => 'Pacheco Ospitia'],
            ['id' => 2,
            'identification_document' => 87455552,
            'names' => 'Maria Paulina',
            'surnames' => 'Alzate'],
            
        ];

        foreach ($bankPersons as $key => $bankPerson) {
            BankPerson::create($bankPerson);
        }
    }
}
