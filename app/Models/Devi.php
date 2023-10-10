<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devi extends Model
{
    use HasFactory;

    protected $fillable = ['ref' , 'user_id', "sous_total","total_ttc","remise","taux_tva","is_invoiced"];
    public function services(){
        return $this->belongsToMany(Service::class, 'devi_service', 'devi_id', 'service_id');
    }

    // Relation One-to-One avec Facture
    public function facture(){
        return $this->hasOne(Facture::class);
    }

    // Relation Many-to-One avec User
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relation Many-to-Many avec Tâche
    public function taches()
    {
        return $this->hasMany(Tache::class);
    }

}
