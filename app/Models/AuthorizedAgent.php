<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuthorizedAgent extends Model
{
    use HasFactory;

    protected $table = 'authorized_agents';

    protected $fillable = [
        'ministere_id',
        'direction_id',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
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
