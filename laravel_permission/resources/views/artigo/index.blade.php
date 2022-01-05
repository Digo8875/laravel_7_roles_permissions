@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12 mb-4">
            <div class="row m-0 p-0 justify-content-center font-weight-bold">
                {{ __('Meus Artigos') }}
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="row m-0 p-0 justify-content-center">
                <a class="btn btn-success" href="{{ route('artigo.create') }}">
                    {{ __('Novo Artigo') }}
                </a>
            </div>
        </div>

        @if(count($artigos) < 1)
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center">
                        {{ __('Você ainda não possui artigos cadastrados no sistema') }}
                    </div>
                </div>
            </div>
        @else
            @foreach($artigos as $artigo)
                <div class="col-4 m-2">
                    <div class="row m-0 p-0 justify-content-center card">
                        <div class="card-header">
                            {{ $artigo->name }}
                        </div>
                        <div class="card-body">
                            <div class="row m-0 p-0">
                                <div class="col-12 m-0 p-0">
                                    {{ $artigo->texto }}
                                </div>
                                <div class="col-12 m-0 p-0 mt-3">
                                    <a class="btn btn-warning" href="{{ route('artigo.edit', $artigo->id) }}">
                                        {{ __('Editar') }}
                                    </a>

                                    <a class="btn btn-info" href="{{ route('artigo.show', $artigo->id) }}">
                                        {{ __('Detalhes') }}
                                    </a>

                                    <a class="btn btn-danger" href="{{ route('artigo.destroy', $artigo->id) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();">
                                        {{ __('Excluir') }}
                                    </a>
                                    <form id="delete-form" action="{{ route('artigo.destroy', $artigo->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
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
