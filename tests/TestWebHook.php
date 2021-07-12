<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TestWebHook extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function doRequest()
    {
        $this->post('/api_v1/webhook/log/1',
            json_decode('{
                "transaction_time": "1603711958",
                "id": "e0c523cd-3dfd-4206-83b4-9c0dc32dd77e",
                "event": "in-store-txn",
                "value": 13.98,
                "status": "complete",
                "customer_id": "e0c523cd-3dfd-4206-83b4-9c0dc32dd77e"
            }'),
            [
                "Accept" => "application/json"
            ]
        );

        $this->assertEquals(
            200, $this->response->getStatusCode()
        );
    }
}
