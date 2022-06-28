<?php

namespace GertjanRoke\Stronghold\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $attributes)
 */
class File extends Model
{
    use HasFactory;

    protected $table = 'stronghold_files';

    protected $fillable = [
        'name',
        'filename',
        'path',
    ];
}
