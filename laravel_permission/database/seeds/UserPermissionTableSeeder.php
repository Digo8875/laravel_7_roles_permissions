<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_permission')->insert([
            [
                'id_user' => 1,
                'id_permission' => 2,
                'expires_at' => null,
                'status' => 'UNLOCKED',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],[
                'id_user' => 2,
                'id_permission' => 3,
                'expires_at' => null,
                'status' => 'UNLOCKED',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],[
                'id_user' => 4,
                'id_permission' => 1,
                'expires_at' => null,
                'status' => 'UNLOCKED',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],[
                'id_user' => 1,
                'id_permission' => 4,
                'expires_at' => null,
                'status' => 'UNLOCKED',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],[
                'id_user' => 2,
                'id_permission' => 4,
                'expires_at' => null,
                'status' => 'UNLOCKED',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],[
                'id_user' => 3,
                'id_permission' => 4,
                'expires_at' => null,
                'status' => 'UNLOCKED',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],[
                'id_user' => 4,
                'id_permission' => 4,
                'expires_at' => null,
                'status' => 'UNLOCKED',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],[
                'id_user' => 5,
                'id_permission' => 4,
                'expires_at' => null,
                'status' => 'UNLOCKED',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
