<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User:: create([
            'name'=>'MoHaridy',
            'email'=>'moharidy98@gmail.com',
            'password'=> Hash ::make('123456789'),
            'role'=>'super_admin',
            'state'=>'1',
        ]);
        $user->assignRole('super_admin');
    }
}
