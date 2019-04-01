<?php

use App\JenisKain;
use App\Vendor;
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
        factory('App\User')->create([
            'email' => 'vendor@gmail.com',
            'role' => 'Vendor'
        ]);

        $users = factory('App\User', 8)->create([
            'role' => 'Vendor'
        ]);
        $users->each(function($user){
            factory('App\Vendor')->create([
                'user_id' => $user->id
            ]);
        });

        $vendors = Vendor::all();
    	$vendors->each(function($vendor){
            factory('App\File')->states('image')->create([
                'subject_id' => $vendor->id,
                'subject_type' => get_class($vendor)
            ]);
            factory('App\Ulasan', 5)->create([
                'vendor_id' => $vendor->id
            ]);
        });

        $ulasans = Ulasan::all();
        $ulasans->each(function($ulasan){
            factory('App\File')->states('image')->create([
                'subject_id' => $ulasan->id,
                'subject_type' => get_class($ulasan)
            ]);
        });

        factory('App\JenisKain', 6)->create();
    	$jeniskains = JenisKain::all();
    	$jeniskains->each(function($jeniskain){
    		factory('App\File')->states('image')->create([
    			'subject_id' => $jeniskain->id,
    			'subject_type' => get_class($jeniskain)
    		]);
    	});
    }
}
