<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Samuel Gerges',
            'email' => 'admin@app.com',
            'password' => '123456',
        ]);


    }//end of run

}//end of seeder
