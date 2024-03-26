<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WalletsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('wallets')->delete();
        
        \DB::table('wallets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'balance' => '7326.20',
                'created_at' => '2024-03-06 08:43:54',
                'updated_at' => '2024-03-08 13:47:56',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'balance' => '1500.00',
                'created_at' => '2024-03-09 10:42:41',
                'updated_at' => '2024-03-09 13:38:24',
            ),
        ));
        
        
    }
}