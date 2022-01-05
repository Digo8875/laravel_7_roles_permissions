<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct(){

        // $this->middleware('permission:artigo-reviewer', ['only' => ['testPermissionReviewer']]);
        // $this->middleware('permission:test-access', ['only' => ['testPermissionReviewer']]);
        // $this->middleware('permission:permission-manage', ['only' => ['testPermissionManager']]);
    }

    public function testBladeRole(){

        return view('test_views.blade_role');
    }

    public function testBase(){

        $user = auth()->user();



        if(!$user->can('test-access'))
            abort(403, 'Acesso não autorizado'.'.');


        dd($user->permissions->pluck('slug')->toArray());


        dd($user->can('artigo-reviewer'));



        $user->givePermissions([1]);
        // $user->revokePermissions([1]);
        dd($user->hasPermission('artigo-reviewer'));
        dd($user->permissions[0]->user_permission->status);


        $routes = \Route::getRoutes()->getRoutes();

        dd($routes[26]->getAction());


        dd('test');
    }

    public function testPermissionReviewer(){

        dd('Permissao > artigo-reviewer');
    }

    public function testPermissionManager(){

        $user = auth()->user();

        if(!$user->can('permission-manage'))
            abort(403);

        dd('Permissao > permission-manage');
    }
}
