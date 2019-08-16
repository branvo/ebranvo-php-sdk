<?php

namespace Ebranvo;

class Request {
    private $client;
    
    public function __construct(\GuzzleHttp\Client $client) {
        $this->client = $client;
    }

    /**
     * send
     *
     * @param  string $url
     * @param  string $method
     * @param  array $headers
     * @param  array $body
     *
     * @return string
     */
    public function send(string $url, string $method, array $headers, array $body = []) {
        try {
            $response = $this->client->request($method, $url, ['headers' => $headers, 'json' => $body]);
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
