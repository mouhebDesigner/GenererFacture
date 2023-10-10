@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ __('Services') }}</li>
            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">{{ __('Liste des services') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Modifier un service') }}</li>
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
                    <h6 class="card-title">{{ __('Modifier un service') }}</h6>
                    <form method="POST" action="{{ route('services.update', $service->id) }}" id="formInputs">
                        @csrf
                        @method('PUT') {{-- Utilisez la méthode PUT pour la mise à jour --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">{{ __('Titre') }}*</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" placeholder="{{ __('Titre') }}" value="{{ $service->title }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">{{ __('Description') }}*</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description" rows="4" placeholder="{{ __('Description') }}">{{ $service->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" id="updateBtn">{{ __('Modifier') }}</button>
                        <a href="{{ route('services.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
