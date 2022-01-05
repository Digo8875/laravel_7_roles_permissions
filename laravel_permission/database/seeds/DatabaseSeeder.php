<?php

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
        // $this->call(UserSeeder::class);

        //Chamada dos Seeders para popular o DB inicial
        $this->call([

            UserTableSeeder::class,
            RoleTableSeeder::class,
            UserRoleTableSeeder::class,
            PermissionTableSeeder::class,
            UserPermissionTableSeeder::class,

        ]);
    }
}
