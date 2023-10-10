<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = ['ref', 'devi_id'];

    public function devi(){
        return $this->belongsTo(Devi::class);
    }
}
