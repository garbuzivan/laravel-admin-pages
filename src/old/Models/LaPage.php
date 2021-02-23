<?php

declare(strict_types=1);

namespace GarbuzIvan\LaravelAdminPages\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaPage extends Model
{
    use HasFactory;

    protected $table = 'la_pages';

    /**
     * @var array<string> $fillable
     */
    protected $fillable = [
        'name',
        'title',
        'keywords',
        'descriptions',
        'url',
        'text',
        'active_text',
        'publish',
    ];

    /**
     * Get a publish page
     *
     * @param $query
     * @return mixed
     */
    public function scopeActivePage($query)
    {
        return $query->where('publish', 1);
    }
}
