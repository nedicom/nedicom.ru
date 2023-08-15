<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

    /**
     * Run the database seeds.
     *
     * @return void
     */
class Objavleniya extends Seeder

{
    public function run()
    {
        /*DB::table('objavleniya')->insert([
            'obj_name' => Str::random(10),
            'obj_desc' => Str::random(50),
            'author_id' => 1,
            'url' => Str::random(10),
            'longdescription' => Str::random(100),
            'preimushestvo1' => 'рандомное преимущество 1',
            'preimushestvo2' => 'рандомное преимущество 2',
            'preimushestvo3' => 'рандомное преимущество 3',
            'address' => 'рандомный адрес',
            'phone' => '8 888 8888 888',
            'maps' => Str::random(10),
        ]);*/
    }
}
