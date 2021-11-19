<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    /**
     * Fields protected from mass assignment.
     *
     * @var array
     */
    protected $guarded = [

    ];

    /**
     * Converted fields.
     *
     * @var string[]
     */
    protected $casts = [
        'id' => 'string',
    ];
}
