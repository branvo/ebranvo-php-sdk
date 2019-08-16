<?php

namespace Ebranvo;

class Environment {
    private $url;

    private $urls = [
        'live'        => 'https://api.ebranvo.com/v1',
        'sandbox'     => 'https://sandbox-api.ebranvo.com/v1',
        'testing'     => 'testing-api.ebranvo.com/v1',
        'development' => '192.168.33.101/branvo/ebranvo_api/v1'
    ];

    public function __construct($env = null) {
        $this->url = $this->urls[$env] ?? null;
    }

    /**
     * Set environment to live/production
     */
    public function live() {
        $this->url = $this->urls['live'];
    }

    /**
     * Set environment to sandbox
     */
    public function sandbox() {
        $this->url = $this->urls['sandbox'];
    }

    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }
}
