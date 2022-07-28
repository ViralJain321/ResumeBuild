<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecord = [ 
            'id' => 1 , 
            'name' => 'TheAdmin' , 
            'email' => 'admin@text.com' ,
            'password' => Hash::make('1234') ,
            'contact_no' => '9632587419'
    ];

        Admin::insert($adminRecord);
    }
}
