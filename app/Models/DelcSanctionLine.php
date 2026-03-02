<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DelcSanctionLine extends Model
{
    use SoftDeletes;

    protected $table = 'delc_sanction_lines';

    protected $fillable = [
        'data_collection_id',
        'corps',
        'sexe',
        'sanction',
        'motif',
    ];

    public function dataCollection()
    {
        return $this->belongsTo(DataCollection::class);
    }
}
