<?php

namespace App\Tests\Api\Controller;

use App\OrderDelivery\Infrastructure\Ulti\Constant;


class OrderControllerTest extends AbstractControllerTest
{

    public function testSendOrderRequest()
    {

        //valid reuest
        $this->client->request(
            'POST',
            '/api/sendorders',
            [],
            [],
            [
                'CONTENT_TYPE' => 'application/json'
            ],
            json_encode(Constant::VALID_ORDERS)
        );
        $response = $this->client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
        //invalid reuest, should be POST request
        $this->client->request(
            'GET',
            '/api/sendorders',
            [],
            [],
            [
                'CONTENT_TYPE' => 'application/json'
            ],
            json_encode(Constant::VALID_ORDERS)
        );
        $response = $this->client->getResponse();

        $this->assertEquals(405, $response->getStatusCode());
    }

    public function testProcessOrderRequest()
    {

        //valid reuest
        $this->client->request(
            'POST',
            '/api/validateorders',
            [],
            [],
            [
                'CONTENT_TYPE' => 'application/json'
            ],
            json_encode(Constant::API_TOKEN)
        );
        $response = $this->client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());

        //invalid reuest, should be POST request
        $this->client->request(
            'GET',
            '/api/validateorders',
            [],
            [],
            [
                'CONTENT_TYPE' => 'application/json'
            ],
            json_encode(Constant::API_TOKEN)
        );
        $response = $this->client->getResponse();

        $this->assertEquals(405, $response->getStatusCode());
    }


    public function testConfirmOrderRequest()
    {

        //valid reuest
        $this->client->request(
            'POST',
            '/api/confirmorders',
            [],
            [],
            [
                'CONTENT_TYPE' => 'application/json'
            ],
            json_encode(Constant::API_TOKEN)
        );
        $response = $this->client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());

        //invalid reuest, should be POST request
        $this->client->request(
            'GET',
            '/api/confirmorders',
            [],
            [],
            [
                'CONTENT_TYPE' => 'application/json'
            ],
            json_encode(Constant::API_TOKEN)
        );
        $response = $this->client->getResponse();

        $this->assertEquals(405, $response->getStatusCode());
    }

}
