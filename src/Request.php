<?php

namespace Ebranvo;

class Request {
    private $client;
    
    public function __construct(\GuzzleHttp\Client $client) {
        $this->client = $client;
    }

    /**
     * Make a http request
     *
     * @param  string $url
     * @param  string $method
     * @param  array $headers
     * @param  array $body
     *
     * @return string
     */
    public function send(string $url, string $method, array $headers, string $body = null) {
        try {
            $request  = new \GuzzleHttp\Psr7\Request($method, $url, $headers, $body);
            $response = $this->client->send($request);
            return $this->return($response->getBody());
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return $this->return(
                $e->hasResponse()            ?
                $e->getResponse()->getBody() :
                ['success' => false, 'Ocorreu um erro inesperado']
            );
        } catch (\Exception $e) {
            return $this->return(['success' => false, 'Ocorreu um erro inesperado']);
        }
    }

    /**
     * Read a stream
     *
     * @param  Stream $stream
     *
     * @return string
     */
    private function read(\GuzzleHttp\Psr7\Stream $stream): string {
        for ($content = ''; !$stream->eof(); $content .= $stream->read(1024));
        return $content;
    }

    /**
     * Parse content to return
     *
     * @param  mixed $content
     *
     * @return string
     */
    private function return($content): string {
        if ($content instanceof \GuzzleHttp\Psr7\Stream)
            return $this->read($content);
        return \Ebranvo\Util\Json::encode($content);
    }
}
