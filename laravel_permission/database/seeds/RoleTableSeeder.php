<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            [
	        	'name' => 'Admin Master',
                'slug' => 'admin-master',
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			],[
	        	'name' => 'Admin Permissões',
                'slug' => 'admin-permissions',
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			],[
	        	'name' => 'Escritor',
                'slug' => 'escritor',
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			],[
	        	'name' => 'Revisor',
                'slug' => 'revisor',
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			],[
	        	'name' => 'Leitor',
                'slug' => 'leitor',
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			]
    	]);
    }
}
