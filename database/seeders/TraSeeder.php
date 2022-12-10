<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tra_accounts')->insert([
            "first_name"=>"Baraka",
            "middle_name"=>"Elias",
            "last_name"=>"Urio",
            "nida_id"=>2,
            "tin_number"=>"127456789"
        ]);
        DB::table('tra_accounts')->insert([
            "first_name"=>"Glorius",
            "middle_name"=>"Swai",
            "last_name"=>"Swai",
            "nida_id"=>1,
            "tin_number"=>"127457789"
        ]);
        DB::table('tra_accounts')->insert([
            "first_name"=>"Haidery",
            "middle_name"=>"Winna",
            "last_name"=>"Shango",
            "nida_id"=>3,
            "tin_number"=>"127456799"
        ]);
    }
}
