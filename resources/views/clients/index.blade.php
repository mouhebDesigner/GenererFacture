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
            <li class="breadcrumb-item">{{ __('Clients') }}</li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Liste de clients') }}</li>
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
                        <h6 class="card-title">{{ __('Liste de clients') }}</h6>
                        <a href="{{ route('clients.create') }}" class="btn btn-primary">{{ __('Ajouter un client') }}</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Prénom') }}</th>
                                    <th>{{ __('Nom de famille') }}</th>
                                    <th>{{ __('E-mail') }}</th>
                                    <th>{{ __('Téléphone') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->prenom }}</td>
                                        <td>{{ $client->nom }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->telephone }}</td>
                                        <td>
                                            <div class="d-flex" style="gap: 10px">
                                                <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary btn-icon">
                                                    <i class="fas fa-edit"></i> 
                                                </a>
                                                <button class="btn btn-danger btn-delete btn-icon" data-url="{{ route('clients.destroy', ['client' => $client]) }}">
                                                    <i class="fas fa-trash"></i> 
                                                </button>
                                            </div>
                                            
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-block mt-4">   
                            {{ $clients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
