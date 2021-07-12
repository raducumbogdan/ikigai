<?php


namespace App\Services\Providers;


/**
 * Interface ProviderInterface
 * @package App\Services\Providers
 */
interface ProviderInterface
{
    /**
     * @return mixed
     */
    public function validatePayload();

    /**
     * @return mixed
     */
    public function translateEvent();

    /**
     * @return mixed
     */
    public function translateTransactionTime();
}
