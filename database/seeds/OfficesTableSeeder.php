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
                'div_name' => 'Technical Service Provider',
                'acronym'  => 'TSS',
            ],
            [
                'div_name' => 'Field Operations Division',
                'acronym'  => 'FOD',
            ],
            [
                'div_name' => 'Finance and Administrative Services',
                'acronym'  => 'FAS',
            ],
            [
                'div_name' => 'Office of the Regional Director',
                'acronym'  => 'ORD',
            ],
        ];

        foreach ($offices as $office) {
            Offices::create($office);
        }
    }
}
