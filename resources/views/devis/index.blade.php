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
                        <a href="{{ route('devis.create') }}" class="btn btn-primary">{{ __('Ajouter un devi') }}</a>
                    </div>
                   
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Référence du devis') }}</th>
                                    <th>{{ __('Client') }}</th>
                                    <th>{{ __('Services') }}</th>
                                    <th>{{ __('Est facturé') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($devis as $devi)
                                    <tr>
                                        <td>{{ $devi->ref }}</td>
                                        <td>{{ $devi->user->nom }} {{ $devi->user->prenom }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($devi->services as $service)
                                                    <li>{{ $service->title }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            @if ($devi->is_invoiced)
                                                Oui
                                            @else
                                                Non
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex" style="gap: 10px">
                                                <button class="btn btn-danger btn-delete btn-icon" data-url="{{ route('devis.destroy', ['devi' => $devi]) }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <a href="{{ route('devis.show', $devi) }}" class="btn btn-info btn-icon">
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
