<?php

namespace Core\Modules\Desafio\NFeSync\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Entidade Desafio.
 */
class NFe extends Model
{
    use HasFactory;

    protected $primaryKey = 'access_key';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<double, string>
     */
    protected $fillable = [
        'access_key',
        'price',
    ];
}
