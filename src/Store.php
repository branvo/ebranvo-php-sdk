<?php

namespace Ebranvo;

class Store {
    private $token;

    public function __construct($token) {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getToken() {
        return $this->token;
    }
}
