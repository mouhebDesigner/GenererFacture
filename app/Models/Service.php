<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'user_id'];
    // Relation Many-to-One avec Utilisateur (Client)
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relation Many-to-Many avec Devis
    public function devis(){
        return $this->belongsToMany(Devi::class, 'devi_service', 'service_id', 'devi_id');
    }

    // Relation Many-to-Many avec Tâche
    public function taches()
    {
        return $this->hasMany(Tache::class);
    }
}
