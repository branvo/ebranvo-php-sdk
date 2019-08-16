<?php

namespace Ebranvo\Ecommerce;

class Address {
    public function getEndPoint(string $action) {
        return $action === 'all' ? '{version}/clientes/{param}/enderecos' : '{version}/clientes/enderecos/{param}';
    }
}