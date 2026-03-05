<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ministere extends Model
{
    use HasFactory;

    protected $table = 'ministeres';

    protected $fillable = [
        'name',
        'code',
        'description',
        'requires_authentication',
        'parent_id',
    ];

    public function dataCollections(): HasMany
    {
        return $this->hasMany(DataCollection::class);
    }

    public function directions(): HasMany
    {
        return $this->hasMany(Direction::class);
    }

    // Parent ministère (si c'est une division)
    public function parent()
    {
        return $this->belongsTo(Ministere::class, 'parent_id');
    }

    // Divisions enfants (si c'est un ministère parent)
    public function divisions()
    {
        return $this->hasMany(Ministere::class, 'parent_id');
    }
}
