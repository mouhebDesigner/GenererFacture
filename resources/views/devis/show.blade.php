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
                        <!-- Ajoutez un bouton pour exporter en PDF -->
                        <div class="mb-3">
                            <a href="{{ route('devis.pdf', ['id' => $devi->id]) }}" class="btn btn-primary">Exporter en PDF</a>
                            @if (!$devi->is_invoiced) <!-- Check if the devi is not already invoiced -->
                                <a href="{{ route('factures.create', ['devis_id' => $devi->id]) }}" class="btn btn-success">Transformez en facture</a>
                            @endif
                        </div>

                    </div>

                    <!-- Display Tache data in a table -->
                    <h6 class="card-title">{{ __('Taches du devis') }}</h6>
                    @foreach($devi->user->services()->whereNull('status')->get() as $service)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Service
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $service->title }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

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
                                @foreach ($service->taches as $tache)
                                    <tr>
                                        <td>{{ $tache->description }}</td>
                                        <td>{{ $tache->quantite }}</td>
                                        <td>{{ $tache->prixUnitaire }}</td>
                                        <td>{{ $tache->prixHT }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach

                    <!-- Additional Information (sous_total, total_ttc, remise, taux_tva) -->
                    <h6 class="card-title">{{ __('Informations supplémentaires') }}</h6>
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
                                <th>{{ __('Sous-total') }}</th>
                                <td>{{ $devi->sous_total }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Total TTC') }}</th>
                                <td>{{ $devi->total_ttc }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Remise') }}</th>
                                <td>{{ $devi->remise }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Taux TVA') }}</th>
                                <td>{{ $devi->taux_tva }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
