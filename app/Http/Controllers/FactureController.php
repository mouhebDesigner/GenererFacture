<?php

namespace App\Http\Controllers;

use App\Models\Devi;
use App\Models\Facture;
use Illuminate\Http\Request;
use PDF;
class FactureController extends Controller
{

    public function index()
    {
        // Retrieve a list of invoices
        $factures = Facture::all();

        return view('factures.index', compact('factures'));
    }

    public function create($devis_id)
    {
        // Récupérer le devis en fonction de son ID
        $devis = Devi::findOrFail($devis_id);

        // Vérifier si le devis n'est pas déjà facturé
        if ($devis->is_invoiced) {
            return redirect()->back()->with('error', 'Ce devis a déjà été facturé.');
        }

        // Generate a unique "ref" using Str::uuid()
        $prefix = 'F-';
        $randomNumber = mt_rand(1000, 9999); // Generate a random 4-digit number

        $ref = $prefix . $randomNumber;

        // Créer la facture basée sur le devis
        $facture = new Facture([
            'ref' => $ref, // Référence de facture basée sur le devis
            'devi_id' => $devis->id, // ID du client
            // Autres champs de la facture à remplir
        ]);

        // Sauvegarder la facture
        $facture->save();

        // Marquer le devis comme facturé
        $devis->is_invoiced = true;
        $devis->save();

        return redirect()->route('devis.index',)
            ->with('success', 'Le devis '.$devis->ref.' a été transformé en facture avec succès.');
    }

    public function show(Facture $facture)
    {
        return view('factures.show', compact('facture'));
    }

    public function destroy(Facture $facture)
    {
        $facture->delete();

        return response()->json(['isConfirmed' => 'Facture supprimé avec succée']);

    }

    public function exportPDF($id)
    {
        $facture = Facture::findOrFail($id);
        $pdf = PDF::loadView('factures.pdf', ['facture' => $facture]);

        return $pdf->download('factures.pdf');
    }
}

