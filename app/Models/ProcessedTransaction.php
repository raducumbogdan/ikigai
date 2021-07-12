<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProcessedTransaction
 * @package App\Models
 *
 * Table used to store processed, unique transactions
 */
class ProcessedTransaction extends Model
{
    /**
     * @var string
     */
    protected $connection = 'mysql';
    /**
     * @var string
     */
    protected $table = 'processed_transaction';

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
        'id_provider',
        'id_event',
        'id_customer',
        'id_raw_transaction',
        'value',
        'btc_value',
        'status',
        'transaction_unique_id',
        'transaction_time'
    ];

    /**
     * @return BelongsTo
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'id_provider', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(GenericEvent::class, 'id_event', 'id');
    }


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
    public function rawTransaction()
    {
        return $this->belongsTo(RawTransaction::class, 'id_raw_transaction', 'id');
    }
}
