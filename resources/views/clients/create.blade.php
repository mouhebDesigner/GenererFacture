@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ __('Clients') }}</li>
            <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">{{ __('Liste de clients') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Ajouter un client') }}</li>
        </ol>
    </nav>

    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Ajouter un client') }}</h6>
                    <form method="POST" action="{{ route('clients.store') }}" id="formInputs">
                        @csrf
                        <div class="mb-3">
                            <label for="prenom" class="form-label">{{ __('Prénom') }}*</label>
                            <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom"
                                name="prenom" placeholder="{{ __('Prénom') }}" value="{{ old('prenom') }}">
                            @error('prenom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">{{ __('Nom de famille') }}*</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom"
                                name="nom" placeholder="{{ __('Nom de famille') }}" value="{{ old('nom') }}">
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">{{ __('Adresse') }}*</label>
                            <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse"
                                name="adresse" placeholder="{{ __('Adresse') }}" value="{{ old('adresse') }}">
                            @error('adresse')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('E-mail') }}*</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="{{ __('E-mail') }}" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">{{ __('Téléphone') }}*</label>
                            <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone"
                                name="telephone" placeholder="{{ __('Téléphone') }}" value="{{ old('telephone') }}">
                            @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Mot de passe') }}*</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                name="password" placeholder="{{ __('Mot de passe') }}">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" id="addBtn">{{ __('Ajouter') }}</button>
                        <a href="{{ route('clients.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
