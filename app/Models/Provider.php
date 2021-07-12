<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Provider
 * @package App\Models
 *
 * Table used to store all providers with their information
 */
class Provider extends Model
{

    /**
     * @var string
     */
    protected $connection = 'mysql';
    /**
     * @var string
     */
    protected $table = 'provider';
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'service_name'
    ];


    /**
     * @return array
     */
    public static function existsProviderRules()
    {
        return [
            'id' => 'required|numeric|exists:provider'
        ];
    }
}
