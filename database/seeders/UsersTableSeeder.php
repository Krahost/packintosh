<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Jonthan',
                'email' => 'jona@gmail.com',
                'is_admin' => '0',
                'email_verified_at' => NULL,
                'password' => '$2y$10$gfPjED7nszC3CzEFwunCxOs89W6Mo2UvJELRfE1mi.q5SDwF.A.pm',
                'remember_token' => NULL,
                'created_at' => '2023-12-01 11:42:26',
                'updated_at' => '2023-12-02 06:45:25',
                'image' => '1701503125.jpg',
                'phone' => '+233550422982',
                'bio' => 'we are all good',
                'Account' => 'Active',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'John Doe',
                'email' => 'john@gmail.com',
                'is_admin' => '1',
                'email_verified_at' => NULL,
                'password' => '$2y$12$QSZ7ki/uFuOh3hL0wGahkOImRpLuq25Cy5cRSs5KmxA/rNT7E4qHK',
                'remember_token' => 'tS02OpajWOPjFrtj5JPoj3HM6ZwRkNFOufJMKDuhYoDhbiZnToj5uX6cUaCU',
                'created_at' => '2023-12-02 06:58:18',
                'updated_at' => '2023-12-05 12:53:22',
                'image' => '1701784402.jpg',
                'phone' => '+23330000000',
                'bio' => 'happy smile',
                'Account' => 'Pending',
            ),
            2 => 
            array (
                'id' => 10,
                'name' => 'krahost',
                'email' => 'krahost@gmail.com',
                'is_admin' => '1',
                'email_verified_at' => NULL,
                'password' => '$2y$12$55huU38PcrraKFfi4qEA.e5zf44LPjCIVhVQKEP39Y.pPEwB4lswm',
                'remember_token' => NULL,
                'created_at' => '2023-12-04 13:58:38',
                'updated_at' => '2023-12-04 13:58:38',
                'image' => NULL,
                'phone' => NULL,
                'bio' => NULL,
                'Account' => 'Pending',
            ),
        ));
        
        
    }
}