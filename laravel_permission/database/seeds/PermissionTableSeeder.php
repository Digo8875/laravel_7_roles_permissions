<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission')->insert([
            [
                'name' => 'Revisar Artigos dos Escritores',
                'slug' => 'artigo-reviewer',
                'descricao' => 'Permite acessar Artigos de outros usuários e fazer a revisão da escrita',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],[
                'name' => 'Gerenciar Permissões no Sistema',
                'slug' => 'permission-manage',
                'descricao' => 'Permite todo o processo de CRUD das permissões que serão utilizadas pelos usuários',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],[
                'name' => 'Gerenciar Permissões dos Usuários',
                'slug' => 'permission-users-manage',
                'descricao' => 'Permite adicionar e remover as permissões de determinado usuário',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],[
                'name' => 'Acessar Métodos do TestController',
                'slug' => 'test-access',
                'descricao' => 'Permite Acessar Métodos do TestController',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
