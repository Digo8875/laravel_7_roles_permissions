<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_role')->insert([
            [
	        	'id_user' => 1,
                'id_role' => 1,
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			],[
	        	'id_user' => 2,
                'id_role' => 2,
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			],[
	        	'id_user' => 3,
                'id_role' => 3,
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			],[
	        	'id_user' => 4,
                'id_role' => 4,
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			],[
	        	'id_user' => 5,
                'id_role' => 5,
	        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			]
    	]);
    }
}
