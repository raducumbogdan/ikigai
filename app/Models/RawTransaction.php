<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RawTransaction
 * @package App\Models
 *
 * Table used to store received transactions in raw format
 */
class RawTransaction extends Model
{
    /**
     * @var string
     */
    protected $connection = 'mysql';
    /**
     * @var string
     */
    protected $table = 'raw_transaction';

    /**
     * @var array
     */
    protected $casts = [
        'payload' => 'array'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'payload',
        'id_duplicate_raw_transaction'
    ];
}
