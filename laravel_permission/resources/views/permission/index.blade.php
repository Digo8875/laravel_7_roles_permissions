@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12 mb-4">
            <div class="row m-0 p-0 justify-content-center font-weight-bold">
                {{ __('Permissões do Sistema') }}
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="row m-0 p-0 justify-content-center">
                <a class="btn btn-success" href="{{ route('permission.create') }}">
                    {{ __('Nova Permissão') }}
                </a>
            </div>
        </div>

        @if(count($permissions) < 1)
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center">
                        {{ __('Ainda não há permissões cadastradas no sistema') }}
                    </div>
                </div>
            </div>
        @else
            @foreach($permissions as $permission)
                <div class="col-4 m-2">
                    <div class="row m-0 p-0 justify-content-center card">
                        <div class="card-header">
                            {{ $permission->name }}
                        </div>
                        <div class="card-body">
                            <div class="row m-0 p-0">
                                <div class="col-12 m-0 p-0">
                                    {{ $permission->slug }}
                                </div>
                                <div class="col-12 m-0 p-0 mt-3">
                                    {{ $permission->descricao }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>
@endsection
