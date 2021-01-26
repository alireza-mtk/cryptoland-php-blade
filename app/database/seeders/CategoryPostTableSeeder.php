<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryPostTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category_post')->delete();
        
        \DB::table('category_post')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 2,
                'post_id' => 1,
                'created_at' => '2021-01-09 16:12:14',
                'updated_at' => '2021-01-09 16:12:14',
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 3,
                'post_id' => 1,
                'created_at' => '2021-01-09 16:12:14',
                'updated_at' => '2021-01-09 16:12:14',
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 1,
                'post_id' => 2,
                'created_at' => '2021-01-09 16:17:16',
                'updated_at' => '2021-01-09 16:17:16',
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 3,
                'post_id' => 2,
                'created_at' => '2021-01-09 16:17:16',
                'updated_at' => '2021-01-09 16:17:16',
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 4,
                'post_id' => 2,
                'created_at' => '2021-01-09 16:17:16',
                'updated_at' => '2021-01-09 16:17:16',
            ),
        ));
        
        
    }
}