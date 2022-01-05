@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12 mb-4">
            <div class="row m-0 p-0 justify-content-center font-weight-bold">
                {{ __('Artigos Revisados por mim') }}
            </div>
        </div>

        @if(count($artigos) < 1)
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center">
                        {{ __('Ainda não há Artigos revisados por você') }}
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
                                    <span class="btn {{ $artigo->status == 'PUBLISHED' ? 'btn-success' : 'btn-danger' }}">
                                        {{ __($artigo->status) }}
                                    </span>
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
