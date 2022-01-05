@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12 mb-4">
            <div class="row m-0 p-0 justify-content-center font-weight-bold">
                {{ __('Artigos para Leitura') }}
            </div>
        </div>

        @if(count($artigos) < 1)
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center">
                        {{ __('Ainda não há artigos cadastrados no sistema') }}
                    </div>
                </div>
            </div>
        @else
            @foreach($artigos as $artigo)
                <div class="col-4 m-2">
                    <div class="row m-0 p-0 justify-content-center card">
                        <div class="card-header">
                            {{ $artigo->name }}
                            <div class="row m-0 p-0">
                                {{ __('Autor').': '.$artigo->autor }}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row m-0 p-0">
                                <div class="col-12 m-0 p-0">
                                    {{ $artigo->texto }}
                                </div>
                                <div class="col-12 m-0 p-0 mt-3">
                                    <a class="btn btn-info" href="{{ route('ler_artigo', $artigo->id) }}">
                                        {{ __('Ler') }}
                                    </a>
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
