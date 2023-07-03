<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HeadingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('headings')->insert([
            'title'=>'Общество',
        ]);
        DB::table('headings')->insert([
            'title'=>'городская жизнь',
            'parent_id'=>1,
        ]);
        DB::table('headings')->insert([
            'title'=>'уличная жизнь',
            'parent_id'=>1,
        ]);


    }
}
