<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'appleddddddddddddd',
                'qty' => 20,
                'price' => '5.00',
                'description' => 'big apples',
                'created_at' => '2023-12-01 11:51:41',
                'updated_at' => '2023-12-01 11:51:50',
            ),
        ));
        
        
    }
}