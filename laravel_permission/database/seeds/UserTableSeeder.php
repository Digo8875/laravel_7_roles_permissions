<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
	        	'name' => 'User Admin Master',
                'email' => 'admin_master@email.com',
                'password' => '$2y$10$EbBvinvqgTPFIm1w3J8N2.LJ.c8pjuZZWyhxoYFqCGPSIMTtJrJVe',
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			],[
	        	'name' => 'User Admin Permissões',
                'email' => 'admin_permissoes@email.com',
                'password' => '$2y$10$EbBvinvqgTPFIm1w3J8N2.LJ.c8pjuZZWyhxoYFqCGPSIMTtJrJVe',
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			],[
	        	'name' => 'User Escritor',
                'email' => 'escritor@email.com',
                'password' => '$2y$10$EbBvinvqgTPFIm1w3J8N2.LJ.c8pjuZZWyhxoYFqCGPSIMTtJrJVe',
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			],[
	        	'name' => 'User Revisor',
                'email' => 'revisor@email.com',
                'password' => '$2y$10$EbBvinvqgTPFIm1w3J8N2.LJ.c8pjuZZWyhxoYFqCGPSIMTtJrJVe',
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			],[
	        	'name' => 'User Leitor',
                'email' => 'leitor@email.com',
                'password' => '$2y$10$EbBvinvqgTPFIm1w3J8N2.LJ.c8pjuZZWyhxoYFqCGPSIMTtJrJVe',
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			]
    	]);
    }
}
