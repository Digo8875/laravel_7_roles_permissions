@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Revisar Artigo') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('aceitar_artigo', $artigo->id) }}">
                        @csrf
                        @method('put')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $artigo->name }}" readonly>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="texto" class="col-md-4 col-form-label text-md-right">{{ __('Texto') }}</label>

                            <div class="col-md-6">
                                <input id="texto" type="text" class="form-control" name="texto" value="{{ $artigo->texto }}" required>

                                @error('texto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Aceitar') }}
                                </button>

                                <a class="btn btn-danger" href="{{ route('recusar_artigo', $artigo->id) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('recusar-form').submit();">
                                        {{ __('Recusar') }}
                                </a>
                            </div>
                        </div>
                    </form>

                    <form id="recusar-form" action="{{ route('recusar_artigo', $artigo->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
