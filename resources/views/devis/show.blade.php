@extends('layout.master')
@push('style')
    <!-- Your CSS styles here -->
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ __('Devis') }}</li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Liste des devis') }}</li>
        </ol>
    </nav>

    <div class="row">
        @if (Session::has('success'))
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('Détails du devis') }}</h6>
                        <a href="{{ route('devis.edit', $devi) }}" class="btn btn-primary">{{ __('Modifier le devis') }}</a>
                    </div>

                    <table class="table">
                        <tbody>
                            <tr>
                                <th>{{ __('Référence du devis') }}</th>
                                <td>{{ $devi->ref }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Client') }}</th>
                                <td>{{ $devi->user->nom }} {{ $devi->user->prenom }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Services') }}</th>
                                <td>
                                    <ul>
                                        @foreach ($devi->services as $service)
                                            <li>{{ $service->title }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>

                    <!-- Display Tache data in a table -->
                    <h6 class="card-title">{{ __('Taches du devis') }}</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Quantité') }}</th>
                                <th>{{ __('Prix unitaire') }}</th>
                                <th>{{ __('Prix HT') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($devi->taches as $tache)
                                <tr>
                                    <td>{{ $tache->description }}</td>
                                    <td>{{ $tache->quantite }}</td>
                                    <td>{{ $tache->prixUnitaire }}</td>
                                    <td>{{ $tache->prixHT }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
