<?php

namespace Ebranvo;

use GuzzleHttp\Client;

class Request {
    private $client;
    
    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function send(string $url, string $method, array $headers, array $body = []) {
        try {
            $response = $this->client->request(
                $method,
                $url, [
                'headers' => $headers,
                'json'    => json_encode($body)
            ]);

            return $response->getBody();

            // $body = $response->getBody();

            // $return = '';
            // while (!$body->eof()) {
            //     $return .= $body->read(1024);
            // }
            // return $return;

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getMessage(); exit;
        } catch (\Exception $e) {
            echo $e->getMessage(); exit;
        }
    }
}
