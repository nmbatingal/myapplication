<?php

use Illuminate\Database\Seeder;
use App\Month;

class MonthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $months = [
            [
                'month'   => 'January',
                'acronym' => 'Jan',
            ],
            [
                'month'   => 'February',
                'acronym' => 'Feb',
            ],
            [
                'month'   => 'March',
                'acronym' => 'Mar',
            ],
            [
                'month'   => 'April',
                'acronym' => 'Apr',
            ],
            [
                'month'   => 'May',
                'acronym' => 'May',
            ],
            [
                'month'   => 'June',
                'acronym' => 'Jun',
            ],
            [
                'month'   => 'July',
                'acronym' => 'Jul',
            ],
            [
                'month'   => 'August',
                'acronym' => 'Aug',
            ],
            [
                'month'   => 'September',
                'acronym' => 'Sep',
            ],
            [
                'month'   => 'October',
                'acronym' => 'Oct',
            ],
            [
                'month'   => 'November',
                'acronym' => 'Nov',
            ],
            [
                'month'   => 'December',
                'acronym' => 'Dec',
            ],
        ];

        foreach ($months as $month) {
            Month::create($month);
        }
    }
}
