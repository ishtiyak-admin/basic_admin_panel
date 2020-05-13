<?php

use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //path to sql file
		$sql = base_path('dummy_db/sample_project.sql');

		//collect contents and pass to DB::unprepared
		DB::unprepared(file_get_contents($sql));
    }
}
