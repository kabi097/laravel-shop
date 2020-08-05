<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'admin@admin.pl',
            'password' => Hash::make('qwerty123'),
            'name' => 'Administrator'
        ]);

        Artisan::call('voyager:admin', ['email' => $user->email]);
    }
}
