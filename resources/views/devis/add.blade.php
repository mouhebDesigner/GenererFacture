@extends('layout.master')
@push('style')
    <style>
        /* Style the Add Tache button */
        .add-tache-button {
            background-color: #007BFF; /* Button background color */
            color: #fff; /* Text color */
            padding: 8px 16px; /* Padding around the button text */
            border: none; /* Remove button border */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Change cursor to pointer on hover */
            font-size: 14px; /* Font size */
        }

        /* Style the button on hover */
        .add-tache-button:hover {
            background-color: #0056b3; /* Button background color on hover */
        }
    </style>
@endpush
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ __('Devis') }}</li>
            <li class="breadcrumb-item"><a href="{{ route('devis.index') }}">{{ __('Liste des devis') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Ajouter un devis') }}</li>
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
                    <h6 class="card-title">{{ __('Ajouter un devis') }}</h6>
                    <form method="POST" action="{{ route('devis.store') }}" id="formInputs">
                        @csrf
                        <div class="mb-3">
                            <label for="user_id" class="form-label">{{ __('Client') }}*</label>
                            <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                                <option value="" disabled selected>{{ __('Sélectionner un client') }}</option>
                                @foreach (App\Models\User::where('role', 'client')->get() as $client)
                                    <option value="{{ $client->id }}">
                                        {{ $client->nom }}
                                        {{ $client->prenom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Display the table of services for the selected client -->
                        <div id="services-table"></div>

                        <button type="submit" class="btn btn-primary" id="addBtn">{{ __('Ajouter') }}</button>
                        <a href="{{ route('devis.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
<script>
    // Fetch and display services for the selected client
    document.getElementById('user_id').addEventListener('change', function() {
        var selectedClientId = this.value;
        var servicesTable = document.getElementById('services-table');

        // Fetch the services for the selected client (you'll need to implement this)
        fetchServices(selectedClientId).then(function (services) {
            servicesTable.innerHTML = generateServicesTable(services);
        });
    });

    // Function to fetch services for the selected client (you'll need to implement this)
    function fetchServices(clientId) {
        // Implement an API request to fetch services for the selected client
        // This is just a placeholder for the sake of the example
        return fetch(`/services?user_id=${clientId}`)
            .then(response => response.json());
    }

    // Function to generate a table of services
    function generateServicesTable(response) {
        var services = response.services;

        if (services.length === 0) {
            return '<p>No services available for this client.</p>';
        }

        var tableHtml = '<form data-id="1"><table class="table">';
        tableHtml += `
                    <thead>
                        <tr>
                            <th colspan="2">Service Name</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    `;
        

        services.forEach(function(service, index) {

            tableHtml += `<tbody class="add-tache-form-body">`;
            tableHtml += '<tr>';
                tableHtml += '<td colspan="4">' + service.title + '</td>';
            tableHtml += '</tr>';
        
            tableHtml += '<tr>';
                tableHtml += '<th>Description</th>';
                tableHtml += '<th>Quantité</th>';
                tableHtml += '<th>Prix Unitaire</th>';
                tableHtml += '<th>Prix HT</th>';
                tableHtml += '<th></th>';
            tableHtml += '</tr>';
           
            tableHtml += '<tr>';
                // Add a form to add a "tache" for this service
                tableHtml += '<td><input type="text" class="form-control" name="taches[description][]" placeholder="Description"></td>';
                tableHtml += '<td><input type="text" class="form-control" name="taches[quantite][]" placeholder="Quantité"></td>';
                tableHtml += '<td><input type="text" class="form-control" name="taches[prixUnitaire][]" placeholder="Prix Unitaire"></td>';
                tableHtml += '<td><input type="text" class="form-control" name="taches[prixHT][]" placeholder="Prix HT"></td>';
                
                // Add a button to add a new "tache"
                tableHtml += '<td><button type="button" class="add-tache-button">Add Tache</button></td>';
            tableHtml += '</tr>';
        tableHtml += '</tbody>';

        });

        tableHtml += '</table></form>';

        return tableHtml;
    }


    // Event listener for "Add Tache" buttons
    $(document).on('click', '.add-tache-button', function() {
        var form = $(this).closest('tbody.add-tache-form-body');
        
        var newRow = $('<tr>' +
            '<td><input type="text" class="form-control" name="taches[description][]" placeholder="Description"></td>' +
            '<td><input type="text" class="form-control" name="taches[quantite][]" placeholder="Quantité"></td>' +
            '<td><input type="text" class="form-control" name="taches[prixUnitaire][]" placeholder="Prix Unitaire"></td>' +
            '<td><input type="text" class="form-control" name="taches[prixHT][]" placeholder="Prix HT"></td>' +
            '</tr>');

        form.append(newRow);
    });



</script>

@endpush
