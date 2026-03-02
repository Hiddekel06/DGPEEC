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
        'user_id',
        'ministere_id',
        'form_data',
    ];

    protected $casts = [
        'form_data' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ministere(): BelongsTo
    {
        return $this->belongsTo(Ministere::class);
    }
}
