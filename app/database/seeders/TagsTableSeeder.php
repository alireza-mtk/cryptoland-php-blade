<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'تگ 1',
                'slug' => 'tg-1',
                'created_at' => '2021-01-08 19:43:04',
                'updated_at' => '2021-01-08 19:43:04',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'تگ 2',
                'slug' => 'tg-2',
                'created_at' => '2021-01-08 19:43:10',
                'updated_at' => '2021-01-08 19:43:10',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'تگ 3',
                'slug' => 'tg-3',
                'created_at' => '2021-01-08 19:43:15',
                'updated_at' => '2021-01-08 19:43:15',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'تگ 4',
                'slug' => 'tg-4',
                'created_at' => '2021-01-08 19:43:20',
                'updated_at' => '2021-01-08 19:43:20',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'تگ 5',
                'slug' => 'tg-5',
                'created_at' => '2021-01-08 19:43:26',
                'updated_at' => '2021-01-08 19:43:26',
            ),
        ));
        
        
    }
}