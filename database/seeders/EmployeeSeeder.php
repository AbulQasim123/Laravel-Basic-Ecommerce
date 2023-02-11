<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert(
            [
                [
                    "name" => "AbulQasim",
                    "email" => "abul@gmail.com",
                    "phone" => "5263417852",
                    "age" => 24,
                    "gender" => "Male",
                    "address" => "Soraon Phaphamau allahabad"
                ],
                [
                    "name" => "Anila",
                    "email" => "anila@gmail.com",
                    "phone" => "5263417852",
                    "age" => 24,
                    "gender" => "Female",
                    "address" => "Soraon Phaphamau allahabad"
                ],
                [
                    "name" => "Saira",
                    "email" => "saira@gmail.com",
                    "phone" => "5263417852",
                    "age" => 24,
                    "gender" => "Female",
                    "address" => "Soraon Phaphamau allahabad"
                ],
            ]
        );
    }
}
