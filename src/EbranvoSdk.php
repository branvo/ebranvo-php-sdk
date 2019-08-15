<?php

final class EbranvoSdk {
    private $store;
    private $environment;

    private $clients;
    private $addresses;


    public function __construct(Store $store, Environment $environment) {
        $wait = 2;
        $clients = new LazyCollection($wait);
        $addresses = new LazyCollection($wait);
    }

    public function __get($property) {
        if (!property_exists($property)) {
            throw new EbranvoException("Propridade {$property} não existe.");
        }
        return $this->$property;
    }

    public function send() {
        
    }
}