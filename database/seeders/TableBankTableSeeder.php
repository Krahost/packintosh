<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TableBankTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('table_bank')->delete();
        
        
        
    }
}