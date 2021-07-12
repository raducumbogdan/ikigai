<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProviderEvent
 * @package App\Models
 *
 * Table used to link providers with events in order to obtain a generic event id based on various provider event types
 */
class ProviderEvent extends Model
{
    /**
     * @var string
     */
    protected $connection = 'mysql';
    /**
     * @var string
     */
    protected $table = 'provider_event';
    /**
     * @var array
     */
    protected $fillable = [
        'name'
    ];


    /**
     * @return BelongsTo
     */
    public function genericEvent()
    {
        return $this->belongsTo(GenericEvent::class, 'id_event', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'id_provider', 'id');
    }
}
