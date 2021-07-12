<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class GenericEvent
 * @package App\Models
 *
 * Table used to store generic event types
 */
class GenericEvent extends Model
{
    /**
     * @var string
     */
    protected $connection = 'mysql';
    /**
     * @var string
     */
    protected $table = 'generic_event';
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * @return HasMany
     */
    public function providerEvent()
    {
        return $this->hasMany(ProviderEvent::class, 'id_event', 'id');
    }
}
