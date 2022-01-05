@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12 mb-4">
            <div class="row m-0 p-0 justify-content-center font-weight-bold">
                {{ __('Artigos para Revisar') }}
            </div>
        </div>

        @if(count($artigos) < 1)
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center">
                        {{ __('Ainda não há novos Artigos a serem revisados') }}
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
                                    <a class="btn btn-warning" href="{{ route('revisar_artigo', $artigo->id) }}">
                                        {{ __('Revisar') }}
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
