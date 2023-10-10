<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Devi;
use App\Models\Facture;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DeviController extends Controller
{
    public function index()
    {
        $devis = Devi::all();
        return view('devis.index', compact('devis'));
    }

    public function create()
    {
        return view('devis.add');
    }



    public function store(Request $request)
    {
        // dd($request->all());
        

        // Generate a unique "ref" using Str::uuid()
        $prefix = 'DEVI-';
        $randomNumber = mt_rand(1000, 9999); // Generate a random 4-digit number

        $ref = $prefix . $randomNumber;

        // Create the Devi with the generated "ref," client_id, and service_id
        $devi = Devi::create([
            'ref' => $ref,
            'user_id' => $request->user_id,
            "sous_total" => $request->sous_total,
            "total_ttc" => $request->total_ttc,
            "remise" => $request->remise,
            "taux_tva" => $request->taux_tva
        ]);
        // Attach the selected services to the Devi
        $services = Service::where('user_id', $request->user_id)->whereNull('status')->get();

        $devi->services()->attach($services);
        // Create the tasks and associate them with the Devi
        foreach($services as $service){

            foreach ($request->taches['description'][$service->id] as $key => $tacheData) {
                $devi->taches()->create([
                    'description' => $request->taches['description'][$service->id][$key],
                    'quantite' => $request->taches['quantite'][$service->id][$key],
                    'prixUnitaire' => $request->taches['prixUnitaire'][$service->id][$key],
                    'prixHT' => $request->taches['prixHT'][$service->id][$key],
                    'service_id' => $service->id
                ]);
            }
        }

        return redirect()->route('devis.index')
            ->with('success', 'Devi créé avec succès');
    }


    public function show(Devi $devi)
    {
        return view('devis.show', compact('devi'));
    }

    public function edit(Devi $devi)
    {
        return view('devis.edit', compact('devi'));
    }

    public function update(Request $request, Devi $devi)
    {
        $request->validate([
            'field1' => 'required',
            'field2' => 'required',
            // Ajoutez ici les règles de validation pour les champs de votre modèle Devi
        ]);

        $devi->update($request->all());

        return redirect()->route('devis.index')
            ->with('success', 'Devi mis à jour avec succès');
    }

    public function destroy(Devi $devi)
    {
        // Check if the Devi is associated with a Facture
        if ($devi->is_invoiced) {
            // Get the associated Facture
            $facture = Facture::where('devi_id', $devi->id)->first();

            if ($facture) {
                // Delete the associated Facture
                $facture->delete();
            }
        }
        $devi->delete();

        return response()->json(['isConfirmed' => 'Devi supprimé avec succée']);

    }

    public function exportPDF($id)
    {
        $devi = Devi::findOrFail($id);
        $pdf = PDF::loadView('devis.pdf', ['devi' => $devi]);

        return $pdf->download('devis.pdf');
    }
}
