<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nidas')->insert([
            "nida_number"=>"12345678901234567890",
            "first_name"=>"Glorius",
            "last_name"=>"Swai",
            "phone_number"=>"255624327900",
            "middle_name"=>"Swai",
            "date_of_birth"=>date('Y-m-d'),
        ]);
        DB::table('nidas')->insert([
            "nida_number"=>"12345678901234567891",
            "first_name"=>"Baraka",
            "last_name"=>"Urio",
            "phone_number"=>"255624327900",
            "middle_name"=>"Elias",
            "date_of_birth"=>date('Y-m-d'),
        ]);
        DB::table('nidas')->insert([
            "nida_number"=>"12345678901234567892",
            "first_name"=>"Haidery",
            "last_name"=>"Shango",
            "phone_number"=>"255624327900",
            "middle_name"=>"Winna",
            "date_of_birth"=>date('Y-m-d'),
        ]);
    }
}
