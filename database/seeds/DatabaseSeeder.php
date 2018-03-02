<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = factory(App\User::class)->create([
             'username' => 'Sbonder',
             'email' => 'Sbonder101@gmail.com',
             'password' => bcrypt('sb0nis0,./'),
             'lastname' => 'Nzimande',
             'firstname' => 'Sboniso'
         ]);
    }
}
