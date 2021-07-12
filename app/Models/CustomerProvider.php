<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CustomerProvider
 * @package App\Models
 *
 * Table used to link multiple providers to a single customer
 */
class CustomerProvider extends Model
{
    /**
     * @var string
     */
    protected $connection = 'mysql';
    /**
     * @var string
     */
    protected $table = 'customer_provider';

    /**
     * @var array
     */
    protected $fillable = [
        'id_customer',
        'id_provider'
    ];

    /**
     * @return BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'id_provider', 'id');
    }
}
