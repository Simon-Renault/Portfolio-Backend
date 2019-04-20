<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        User::create([
            'name' => 'Simon Renault',
            'email' => 'simon.renault.pro@gmail.com',
            'password'=> Hash::make('EOS100d147852'),
            'api_token' => Hash::make('EOS100d147852'),
        ]);


    }
}
