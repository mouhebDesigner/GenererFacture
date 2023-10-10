<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Devis PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background: #f9f9f9;
        }

        h1 {
            text-align: center;
        }

        h2 {
            margin-top: 20px;
        }

        /* Add the background color to the table header */
        table th {
            background-color: #56b1ee; /* Your preferred background color */
            color: #fff; /* Text color for table headers */
        }

        /* Style for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        .invoice-details {
            margin-top: 20px;
            background: #56b1ee;
            color: #fff;
            padding: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Facture</h1>

        <p><strong>Référence de la facture :</strong> {{ $facture->ref }}</p>
        <p><strong>Client :</strong> {{ $facture->devi->user->nom }} {{ $facture->devi->user->prenom }}</p>
        <p><strong>Date:</strong> <span id="system-date">{{ $facture->created_at }}</span></p>

        <h2>Services</h2>
        @foreach ($facture->devi->user->services()->whereNull('status')->get() as $service)
            <h3>Service : {{ $service->title }}</h3>
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Prix HT</th>
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

        <table class="invoice-details">
            <tbody>
                <tr>
                    <td><strong>Sous-total:</strong> {{ $facture->devi->sous_total }}</td>
                </tr>
                <tr>
                    <td><strong>Total TTC:</strong> {{ $facture->devi->total_ttc }}</td>
                </tr>
                <tr>
                    <td><strong>Remise:</strong> {{ $facture->devi->remise }}</td>
                </tr>
                <tr>
                    <td><strong>Taux TVA:</strong> {{ $facture->devi->taux_tva }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
</body>
</html>
