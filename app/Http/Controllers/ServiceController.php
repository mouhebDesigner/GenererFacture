<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->input('user_id'); // Get the user_id from the request

        if ($user_id) {
            // If user_id is provided in the request, filter services for that user and return JSON data
            $services = Service::where('user_id', $user_id)->whereNull('status')->get();
            return response()->json(['services' => $services]);
        } else {
            // If no user_id is provided, fetch all services and return the view
            $services = Service::all();
            return view('services.index', compact('services'));
        }
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        // Validation des données d'entrée ici
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $service = Service::create($validatedData);

        $service->user_id = User::find($request->user_id)->id;

        $service->save();

        return redirect()->route('services.index')->with('success', 'Service ajouté avec succès.');
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        // Validation des données d'entrée ici
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $service->update($validatedData);

        return redirect()->route('services.index')->with('success', 'Service mis à jour avec succès.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json(['isConfirmed' => 'Service supprimé avec succée']);

    }
}
