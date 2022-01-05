@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Leitura de Artigo') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 font-weight-bold">
                            {{ $artigo->name }}
                        </div>

                        <div class="col-12">
                            {{ $artigo->created_at->format('d M Y') }}
                        </div>

                        <div class="col-12">
                            {{ __('Autor').': '.$artigo->autor }}
                        </div>

                        <div class="col-12">
                            {{ __('Revisor').': '.$artigo->revisor }}
                        </div>

                        <div class="col-12 mt-4">
                            {{ $artigo->texto }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
