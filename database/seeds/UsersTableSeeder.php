<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();
 
        $users = array(
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.hu', 'password' => 12345, 'remember_token' => 123456789, 'created_at' => new DateTime, 'updated_at' => new DateTime]            
        );
        

        //// Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }
}