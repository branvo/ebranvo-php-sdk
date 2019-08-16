<?php

namespace Ebranvo;

use Ebranvo\Store;
use Ebranvo\Util\Json;
use Ebranvo\Environment;
use Ebranvo\Exception\EbranvoException;
use Ebranvo\Interfaces\EndPointController;

final class EbranvoSdk {
    private $version = 'v1';
    private $store;
    private $client;

    public function __construct(Store $store, Environment $environment) {
        $this->store  = $store;
        $this->client = new \GuzzleHttp\Client(['base_uri' => $environment->getUrl()]);
    }

    public function __call(string $method, array $arguments) {
        list($object, $action) = $this->parseMethodCall($method);

        $endPoint  = $object->getEndPoint($action);
        $argument  = $arguments[0] ?? null;

        return $this->$action($endPoint, $argument);
    }

    private function parseMethodCall(string $method) {
        $action    = substr($method, 0, 3);
        $className = substr($method, 3);

        $class = '\\Ebranvo\\Ecommerce\\' . $className;
        if (!class_exists($class)) {
            throw new EbranvoException("Objeto {$className} não encontrado.");
        }

        $object = new $class();
        if (!method_exists($this, $action)) {
            throw new EbranvoException("Método {$action} não encontrado no objeto {$class}.");
        }

        return [$object, $action];
    }

    private function get(string $endPoint, int $id) {
        $url = $this->replace($endPoint, $id);
        return $this->request($url, 'GET');
    }

    private function all(string $endPoint, int $page) {
        $url = $this->replace($endPoint, $page);
        return $this->request($url, 'GET');
    }

    private function del(string $endPoint, int $id) {
        $url = $this->replace($endPoint, $id);
        return $this->request($url, 'DELETE');
    }

    private function add(string $endPoint, array $body) {
        $url = $this->replace($endPoint);
        return $this->request($url, 'POST', Json::encode($body));
    }

    private function replace(string $string, string $param = '') {
        return rtrim(str_replace(['{version}', '{param}'], [$this->version, $param], $string), '/');
    }

    private function request(string $url, string $method, string $body = null) {
        $headers = ['Account-Token' => $this->store->getToken(), 'Content-Type' => 'application/json'];
        $client = new Request($this->client);
        return $client->send($url, $method, $headers, $body);
    }
}