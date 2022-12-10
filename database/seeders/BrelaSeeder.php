<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class BrelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brela_accounts')->insert([
            "business_name"=>"Swai Logistics",
            "director_name"=>"Glorius Swai",
            "director_phone_number"=>"255624327900",
            "tra_id"=>2,
            "extract"=>"122",
            "tin_number"=>"127457789",
        ]);
        DB::table('brela_accounts')->insert([
            "business_name"=>"Elias Corps",
            "director_name"=>"Elias Urio",
            "director_phone_number"=>"255624327900",
            "tra_id"=>1,
            "extract"=>"133",
            "tin_number"=>"127456789",
        ]);
        DB::table('brela_accounts')->insert([
            "business_name"=>"Shango Ltd",
            "director_name"=>"Haidery Shango",
            "director_phone_number"=>"255624327900",
            "tra_id"=>3,
            "extract"=>"144",
            "tin_number"=>"127456799"
        ]);
    }
}
