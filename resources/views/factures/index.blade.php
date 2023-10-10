@extends('layout.master')
@push('style')
    <style>
        /* Dans votre fichier CSS */
     
        .btn-icon i {
            font-size: 20px; /* Ajustez la taille selon vos besoins */
        }

        .btn-icon.btn-primary {
            background-color: #007bff; /* Couleur du bouton "Modifier" */
            color: #fff; /* Couleur du texte du bouton "Modifier" */
        }

        .btn-icon.btn-danger {
            background-color: #dc3545; /* Couleur du bouton "Supprimer" */
            color: #fff; /* Couleur du texte du bouton "Supprimer" */
        }

        /* Ajustez les styles des boutons en fonction de vos besoins */

    </style>
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
                        <h6 class="card-title">{{ __('Liste des devis') }}</h6>
                    </div>
                   
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Référence du devis') }}</th>
                                    <th>{{ __('Client') }}</th>
                                    <th>{{ __('Services') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($factures as $facture)
                                    <tr>
                                        <td>{{ $facture->ref }}</td>
                                        <td>{{ $facture->devi->user->nom }} {{ $facture->devi->user->prenom }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($facture->devi->services as $service)
                                                    <li>{{ $service->title }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        
                                        <td>
                                            <div class="d-flex" style="gap: 10px">
                                                <button class="btn btn-danger btn-delete btn-icon" data-url="{{ route('factures.destroy', ['facture' => $facture]) }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <a href="{{ route('factures.show', $facture) }}" class="btn btn-info btn-icon">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
