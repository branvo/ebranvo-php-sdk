<?php

namespace Ebranvo;

use Ebranvo\Store;
use Ebranvo\Environment;
use Ebranvo\Exception\EbranvoException;
use Ebranvo\Interfaces\EndPointController;

final class EbranvoSdk {
    private $store;
    private $client;

    public function __construct(Store $store, Environment $environment) {
        $this->store  = $store;
        $this->client = new \GuzzleHttp\Client(['base_uri' => $environment->getUrl()]);
    }

    public function __call(string $method, array $arguments) {
        $object   = $this->getObjectByMethod($method);
        $endPoint = $object->getEndPoint($action);
        $argument = $arguments[0] ?? null;
        return $this->$action($endPoint, $argument);
    }

    private function getObjectByMethod(string $method) {
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

        return $object;
    }

    private function get(string $endPoint, int $id) {
        $url = $endPoint . '/' . $id;
        return $this->request($url, 'GET');
    }

    private function all(string $endPoint, int $page) {
        $url = $endPoint . '/' . $page;
        return $this->request($url, 'GET');
    }

    private function del(string $endPoint, int $id) {
        $url = $endPoint . '/' . $id;
        return $this->request($url, 'DELETE');
    }

    private function add(string $endPoint, array $body) {
        return $this->request($endPoint, 'POST', $body);
    }

    private function request(string $endPoint, $method, $body = []) {
        $headers = ['Account-Token' => $this->store->getToken()];
        $client = new Request($this->client);
        return $client->send($endPoint, $method, $headers, $body);
    }
}