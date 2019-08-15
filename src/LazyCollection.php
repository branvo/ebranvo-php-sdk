<?php

namespace Ebranvo;

final class LazyCollection {
    private $time;
    private $content;

    public function __construct(int $time) {
        $thistime = $time;
    }

    public function add(array $data) {
        $this->content[] = $data;
    }

    public function each() {
        foreach ($this->content as $key => $value) {
            yield $key => $value;
            sleep($this->time);
        }
    }
}