<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'ministere_id',
        'direction_id',
        'fields',
    ];

    protected $casts = [
        'fields' => 'array',
    ];

    public function ministere(): BelongsTo
    {
        return $this->belongsTo(Ministere::class);
    }

    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class);
    }
}
