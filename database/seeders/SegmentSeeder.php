<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Segment;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Segment::create(['name' => 'Niños', 'age_start' => 5, 'age_end' => 12]);
        Segment::create(['name' => 'Adolescentes', 'age_start' => 13, 'age_end' => 18]);
        Segment::create(['name' => 'Jóvenes', 'age_start' => 19, 'age_end' => 28]);
        Segment::create(['name' => 'Adultos jóvenes', 'age_start' => 29, 'age_end' => 40]);
        Segment::create(['name' => 'Adultos', 'age_start' => 40, 'age_end' => 55]);
        Segment::create(['name' => 'Adultos mayores', 'age_start' => 56, 'age_end' => 65]);
        Segment::create(['name' => 'Ancianos', 'age_start' => 66, 'age_end' => 100]);
        //Segment::create(['name' => 'Longevos', 'age-start' => 75, 'age-end' => 150]);

    }
}
