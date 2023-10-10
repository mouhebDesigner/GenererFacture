<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $this->user, // Assurez-vous que l'e-mail est unique, sauf pour l'utilisateur actuel lors de la mise à jour.
            'password' => 'required|min:6', // Exemple de règle de validation pour le mot de passe.
        ];
    }
    
}
