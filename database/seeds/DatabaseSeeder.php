<?php

use App\JenisKain;
use App\Produk;
use App\Ulasan;
use App\Konfeksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User')->create([
            'email' => 'admin@gmail.com',
            'role' => 'Admin'
        ]);
        factory('App\User')->create([
            'email' => 'member@gmail.com',
        ]);
        $konfeksi = factory('App\User')->create([
            'email' => 'konfeksi@gmail.com',
            'role' => 'Konfeksi'
        ]);

        factory('App\Konfeksi')->create([
            'user_id' => $konfeksi->id
        ]);

        $users = factory('App\User', 7)->create([
            'role' => 'Konfeksi'
        ]);
        $users->each(function($user){
            factory('App\Konfeksi')->create([
                'user_id' => $user->id
            ]);
        });

        $konfeksis = Konfeksi::all();
    	$konfeksis->each(function($konfeksi){
            factory('App\Ulasan', 5)->create([
                'konfeksi_id' => $konfeksi->id
            ]);
            factory('App\Produk', 8)->create([
                'konfeksi_id' => $konfeksi->id
            ]);
        });

        factory('App\Artikel', 6)->create();
    }
}
