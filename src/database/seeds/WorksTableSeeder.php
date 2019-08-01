<?php

use Illuminate\Database\Seeder;
use App\Models\Work;

class WorkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');


        for ($i=0; $i<20; $i++) {
            $work = new Work();
            $work->title = "おしごと" . $i;
            $work->description = $faker->text();
            $work->reward = $faker->randomElement([10000, 15000, 18000, 20000, 25000]);
            $work->entry_end_at = $faker->dateTimeBetween('now', '+ 7 days');
            $work->owner_id = 1;
            $work->save();
        }
    }
}
