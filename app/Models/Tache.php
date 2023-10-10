<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = ["description",
        "quantite",
        "prixUnitaire",
        "prixHT",
        "facture_id",
        "devi_id",
        "service_id"
    ];
    // Relation Many-to-One avec Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Relation Many-to-One avec Devis
    public function devis()
    {
        return $this->belongsTo(Devi::class);
    }

    // Relation Many-to-One avec Facture
    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }
}
