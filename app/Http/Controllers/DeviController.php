<?php

namespace App\Http\Controllers;

use App\Models\Devi;
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
        $request->validate([
            'user_id' => 'required',
            'taches.description' => 'required|array',
            'taches.description.*' => 'required|string',
            'taches.quantite' => 'required|array',
            'taches.quantite.*' => 'required|numeric',
            'taches.prixUnitaire' => 'required|array',
            'taches.prixUnitaire.*' => 'required|numeric',
            'taches.prixHT' => 'required|array',
            'taches.prixHT.*' => 'required|numeric',

        ]);

        // Generate a unique "ref" using Str::uuid()
        $prefix = 'DEVI-';
        $randomNumber = mt_rand(1000, 9999); // Generate a random 4-digit number

        $ref = $prefix . $randomNumber;

        // Create the Devi with the generated "ref," client_id, and service_id
        $devi = Devi::create([
            'ref' => $ref,
            'user_id' => $request->user_id,
        ]);
        // Attach the selected services to the Devi
        $services = Service::where('user_id', $request->user_id)->whereNull('status')->get();

        $devi->services()->attach($services);
        // Create the tasks and associate them with the Devi
        foreach ($request->taches['description'] as $key => $tacheData) {
            
            $devi->taches()->create([
                'description' => $request->taches['description'][$key],
                'quantite' => $request->taches['quantite'][$key],
                'prixUnitaire' => $request->taches['prixUnitaire'][$key],
                'prixHT' => $request->taches['prixHT'][$key],
            ]);
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
        $devi->delete();

        return response()->json(['isConfirmed' => 'Devi supprimé avec succée']);

    }
}
