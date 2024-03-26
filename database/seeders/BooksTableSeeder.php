<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('books')->delete();
        
        \DB::table('books')->insert(array (
            0 => 
            array (
                'id' => 274,
                'user_id' => 2,
                'institution' => 'Cape Coast University',
                'hostel' => 'Addo hall',
                'pickup' => '2024-03-27',
                'return' => '2024-04-25',
                'duration' => NULL,
                'jute_boxes' => '100.00',
                'months' => 1,
                'total_amount' => '100.00',
                'image' => '"[\\"\\\\\\/images\\\\\\/171138028814.png\\"]"',
                'address' => 'Nii Tetteh Amui Street, Ashaiman',
                'description' => 'books,boxes',
                'latitude' => '39.92294460',
                'longitude' => '-102.80547530',
                'location_address' => '46601 Yuma Co Rd B, Akron, Colorado 80720, United States',
                'Status' => 'pending',
                'payment' => 'paid',
                'created_at' => '2024-03-25 15:24:48',
                'updated_at' => '2024-03-26 08:35:05',
                'bank_name' => NULL,
                'account_number' => NULL,
                'account_name' => NULL,
            ),
            1 => 
            array (
                'id' => 275,
                'user_id' => 2,
                'institution' => 'Legon Univerity',
                'hostel' => 'knust hostel',
                'pickup' => '2024-06-13',
                'return' => '2024-08-01',
                'duration' => NULL,
                'jute_boxes' => '100.00',
                'months' => 1,
                'total_amount' => '100.00',
                'image' => '"[\\"\\\\\\/images\\\\\\/171138483641.png\\"]"',
                'address' => 'Cape coast university',
                'description' => 'cool,fat,ixce',
                'latitude' => '39.92294460',
                'longitude' => '-102.80547530',
                'location_address' => '46601 Yuma Co Rd B, Akron, Colorado 80720, United States',
                'Status' => 'pending',
                'payment' => 'paid',
                'created_at' => '2024-03-25 16:40:36',
                'updated_at' => '2024-03-26 08:34:46',
                'bank_name' => NULL,
                'account_number' => NULL,
                'account_name' => NULL,
            ),
            2 => 
            array (
                'id' => 276,
                'user_id' => 2,
                'institution' => 'KNUST',
                'hostel' => 'Mahama',
                'pickup' => '2024-03-26',
                'return' => '2024-04-06',
                'duration' => NULL,
                'jute_boxes' => '200.00',
                'months' => 2,
                'total_amount' => '400.00',
                'image' => '"[\\"\\\\\\/images\\\\\\/171138500151.png\\"]"',
                'address' => 'Nii Tetteh Amui Street, Ashaiman',
                'description' => 'food',
                'latitude' => '39.92294460',
                'longitude' => '-102.80547530',
                'location_address' => '46601 Yuma Co Rd B, Akron, Colorado 80720, United States',
                'Status' => 'pending',
                'payment' => 'paid',
                'created_at' => '2024-03-25 16:43:21',
                'updated_at' => '2024-03-26 08:34:25',
                'bank_name' => NULL,
                'account_number' => NULL,
                'account_name' => NULL,
            ),
        ));
        
        
    }
}