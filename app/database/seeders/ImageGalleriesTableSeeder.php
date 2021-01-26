<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ImageGalleriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('image_galleries')->delete();
        
        \DB::table('image_galleries')->insert(array (
            0 => 
            array (
                'id' => 3,
                'imageable_id' => 5,
                'imageable_type' => 'App\\Models\\Job',
                'name' => '1610138310-5ff8c2c6e7847.jpg',
                'size' => '7250',
                'created_at' => '2021-01-08 20:38:30',
                'updated_at' => '2021-01-08 20:38:30',
            ),
            1 => 
            array (
                'id' => 5,
                'imageable_id' => 1,
                'imageable_type' => 'App\\Models\\Post',
                'name' => '1610208855-5ff9d65725986.png',
                'size' => '747',
                'created_at' => '2021-01-09 16:14:15',
                'updated_at' => '2021-01-09 16:14:15',
            ),
            2 => 
            array (
                'id' => 6,
                'imageable_id' => 2,
                'imageable_type' => 'App\\Models\\Post',
                'name' => '1610209036-5ff9d70c6db1f.jpg',
                'size' => '1742',
                'created_at' => '2021-01-09 16:17:16',
                'updated_at' => '2021-01-09 16:17:16',
            ),
        ));
        
        
    }
}