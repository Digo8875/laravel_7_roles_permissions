@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12 mb-4">
            <div class="row m-0 p-0 justify-content-center">
                <span class="btn btn-primary">
                    {{ __('Teste diretrizes ROLE') }}
                </span>
            </div>
        </div>

        @role('escritor')
            <div class="col-12 my-4">
                <hr>
                    {{ __('role > ESCRITOR') }}
                <hr>
            </div>
        @endrole

        @role('revisor')
            <div class="col-12 my-4">
                <hr>
                    {{ __('role > REVISOR') }}
                <hr>
            </div>
        @endrole

        @role('escritor|revisor')
            <div class="col-12 my-4">
                <hr>
                    {{ __('role > ESCRITOR OU REVISOR') }}
                <hr>
            </div>
        @endrole

        @allRoles('escritor|revisor')
            <div class="col-12 my-4">
                <hr>
                    {{ __('roles > ESCRITOR E REVISOR') }}
                <hr>
            </div>
        @endallRoles

        @allRoles('escritor|revisor|admin-master')
            <div class="col-12 my-4">
                <hr>
                    {{ __('roles > ESCRITOR E REVISOR E ADMIN-MASTER') }}
                <hr>
            </div>
        @endallRoles

    </div>
</div>
@endsection
