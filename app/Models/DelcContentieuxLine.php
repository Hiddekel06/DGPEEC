<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DelcContentieuxLine extends Model
{
    use SoftDeletes;

    protected $table = 'delc_contentieux_lines';

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
