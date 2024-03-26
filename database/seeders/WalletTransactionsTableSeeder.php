<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WalletTransactionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('wallet_transactions')->delete();
        
        \DB::table('wallet_transactions')->insert(array (
            0 => 
            array (
                'id' => 156,
                'wallet_id' => 1,
                'type' => 'payment',
                'amount' => '100.00',
                'description' => 'Payment for booking ID: 274',
                'payment_reference' => NULL,
                'created_at' => '2024-03-25 15:28:51',
                'updated_at' => '2024-03-25 15:28:51',
                'reference' => '8t0cj8cn7u',
                'book_id' => 274,
            ),
            1 => 
            array (
                'id' => 157,
                'wallet_id' => 1,
                'type' => 'payment',
                'amount' => '100.00',
                'description' => 'Payment for booking ID: 275',
                'payment_reference' => NULL,
                'created_at' => '2024-03-25 16:41:14',
                'updated_at' => '2024-03-25 16:41:14',
                'reference' => '6a3hc10c3l',
                'book_id' => 275,
            ),
            2 => 
            array (
                'id' => 158,
                'wallet_id' => 1,
                'type' => 'payment',
                'amount' => '400.00',
                'description' => 'Payment for booking ID: 276',
                'payment_reference' => NULL,
                'created_at' => '2024-03-25 16:43:56',
                'updated_at' => '2024-03-25 16:43:56',
                'reference' => '89dusyznxw',
                'book_id' => 276,
            ),
        ));
        
        
    }
}