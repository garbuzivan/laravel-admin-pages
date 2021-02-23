<?php

declare(strict_types=1);

namespace GarbuzIvan\LaravelAdminPages\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaPageVersion extends Model
{
    use HasFactory;

    protected $table = 'la_page_versions';

    /**
     * @var array<string> $fillable
     */
    protected $fillable = [
        'pages_id',
        'text',
        'code',
    ];
}
