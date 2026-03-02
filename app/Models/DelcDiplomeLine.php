<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DelcDiplomeLine extends Model
{
    use SoftDeletes;

    protected $table = 'delc_diplome_lines';

    protected $fillable = [
        'data_collection_id',
        'diplome',
        'nb_demandes_classement',
        'nb_attestations_classement',
        'nb_lettres_non_classement',
        'motif_non_classement',
        'avec_equivalence',
        'sans_equivalence',
    ];

    public function dataCollection()
    {
        return $this->belongsTo(DataCollection::class);
    }
}
