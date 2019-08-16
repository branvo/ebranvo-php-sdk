<?php

namespace Ebranvo;

class Store {
    private $token;

    public function __construct(string $token) {
        $this->token = $token;
    }

    /**
     * getToken
     *
     * @return string
     */
    public function getToken(): string {
        return $this->token;
    }
}
