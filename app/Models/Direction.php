<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $fillable = ['ministere_id', 'name', 'code', 'description'];

    /**
     * Relation: Une direction appartient à un ministère
     */
    public function ministere()
    {
        return $this->belongsTo(Ministere::class);
    }

    /**
     * Relation: Une direction a plusieurs agents autorisés
     */
    public function authorizedAgents()
    {
        return $this->hasMany(AuthorizedAgent::class);
    }
}
