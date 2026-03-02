<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataCollection extends Model
{
    use HasFactory;

    protected $table = 'data_collections';

    protected $fillable = [
        'matricule',
        'ministere_id',
        'form_data',
    ];

    protected $casts = [
        'form_data' => 'array',
    ];

    public function ministere(): BelongsTo
    {
        return $this->belongsTo(Ministere::class);
    }

    public function delcSanctionLines()
    {
        return $this->hasMany(DelcSanctionLine::class);
    }

    public function delcContentieuxLines()
    {
        return $this->hasMany(DelcContentieuxLine::class);
    }

    public function delcDiplomaLines()
    {
        return $this->hasMany(DelcDiplomeLine::class);
    }
}
