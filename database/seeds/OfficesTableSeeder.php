<?php

use Illuminate\Database\Seeder;
use App\Offices;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = [
            [
                'div_name' => 'Office of the Regional Director',
                'acronym'  => 'ORD',
            ],
            [
                'div_name' => 'Finance and Administrative Services',
                'acronym'  => 'FAS',
            ],
            [
                'div_name' => 'Field Operations Division',
                'acronym'  => 'FOD',
            ],
            [
                'div_name' => 'Technical Service Provider',
                'acronym'  => 'TSS',
            ],
        ];

        foreach ($offices as $office) {
            Offices::create($office);
        }
    }
}
