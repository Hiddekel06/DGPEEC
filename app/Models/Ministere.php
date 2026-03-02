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
    ];

    public function dataCollections(): HasMany
    {
        return $this->hasMany(DataCollection::class);
    }
}
