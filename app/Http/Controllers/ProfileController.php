<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;


class ProfileController extends Controller
{
    public function index(){
        return view('profile');
    }

    public function update(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif', // Adjust the file size and allowed file types as needed
        ]);

        // Get the currently authenticated user
        $user = auth()->user();

        // Update the user's profile information
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->adresse = $request->input('adresse');
        $user->ville = $request->input('ville');
        $user->telephone = $request->input('telephone');
        $user->email = $request->input('email');

        // Handle the user's profile photo upload if provided
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('profile-photos', 'public'); // You may need to configure the disk and storage path accordingly

            // Update the user's profile photo path in the database
            $user->photo = $photoPath;
        }

        $user->save();

        // Redirect the user to their updated profile page or to a success page
        return redirect()->route('profile.index')->with('success', 'Profile modifié avec succée');
    }


    public function updatePassword(Request $request)
    {
        // dd($request->all());
        // Validate the form data
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8|confirmed',
        ]);

        // Get the current user
        $user = Auth::user();

        // Check if the current password is correct
        if (!Hash::check($request->input('currentPassword'), $user->password)) {
            return back()->with('error', 'Le mot de passe actuel est incorrect.');
        }

        // Update the user's password
        $user->password = Hash::make($request->input('newPassword'));
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Mot de passe mis à jour avec succès.');
    }

}
