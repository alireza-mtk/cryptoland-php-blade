<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'دسته بندی 1',
                'slug' => 'dsth-bndy-1',
                'created_at' => '2021-01-08 19:43:37',
                'updated_at' => '2021-01-08 19:43:37',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'دسته بندی 2',
                'slug' => 'dsth-bndy-2',
                'created_at' => '2021-01-08 19:43:43',
                'updated_at' => '2021-01-08 19:43:43',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'دسته بندی 3',
                'slug' => 'dsth-bndy-3',
                'created_at' => '2021-01-08 19:43:48',
                'updated_at' => '2021-01-08 19:43:48',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'دسته بندی 4',
                'slug' => 'dsth-bndy-4',
                'created_at' => '2021-01-08 19:43:54',
                'updated_at' => '2021-01-08 19:43:54',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'دسته بندی 5',
                'slug' => 'dsth-bndy-5',
                'created_at' => '2021-01-08 19:43:59',
                'updated_at' => '2021-01-08 19:43:59',
            ),
        ));
        
        
    }
}