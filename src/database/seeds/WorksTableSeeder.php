<?php

use Illuminate\Database\Seeder;
use App\Models\Work;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        for($i=0; $i<10; $i++)
        {
            Work::create([
                'title' => 'お仕事' . $i,
                'owner_id' => 3,
                'reward' => $faker->randomElement([10000, 15000, 18000, 20000, 25000]),
                'entry_end_at' => $faker->dateTimeBetween('now', '+ 7 days'),
                'description' => $faker->text,
            ]);
        }
    }
}
