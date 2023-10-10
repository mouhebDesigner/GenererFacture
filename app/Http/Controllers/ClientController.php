<?php


namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CustomerRequest;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clients = User::where('role', 'client')->paginate(10);
        return view('clients.index', compact('clients'));

    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientRequest $request)
    {
        $userData = $request->all();

        $userData['password'] = Hash::make($request->password);
        $userData['role'] = "client";

        $userData['avatar'] = "avatar-man.png";


        $user = User::create($userData);
            
        return redirect()->route('clients.index')->with('success', 'Client a été crée avec succée.');
            


    }

    // Other methods...

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $client)
    {
    
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'adresse' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users')->ignore($client->id)],
            'password' => 'nullable|min:8',
        ]);

        $userData = $validatedData;

        if($request->has('password')){

            $userData['password'] = Hash::make($request->password);
        }


        $client->update($userData);


        return redirect()->route('clients.index')->with('success', 'Client modifié avec succée.');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $client)
    {
      
        // Delete the user
        $client->delete();

        return response()->json(['isConfirmed' => 'Client supprimé avec succée']);
    }

  
}
