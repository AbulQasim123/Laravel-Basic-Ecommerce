<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
			// This is perfect
		// DB::table('student')->insert([
		// 	"name" => "Ram",
		// 	"email" => "ram@gmail.com",
		// 	"phone" => "5263417852",
		// 	"age" => 24,
		// 	"gender" => "Male",
		// 	"address" => "Soraon Phaphamau allahabad",
		// ]);

			// This is with faker library 
		$faker = \Faker\Factory::create();
		DB::table('students')->insert([
			"name" => $faker->name(),
			"email" => $faker->safeEmail,
			"phone" => $faker->phoneNumber,
			"age" => $faker->numberBetween(20,45),
			"gender" => $faker->randomElement([
				'Male','Female','Other'
			]),
			"address" => $faker->address,
			// "password" => FacadesHash::make("12345")
		]);
    }
}
