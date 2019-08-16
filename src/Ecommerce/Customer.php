<?php

namespace Ebranvo\Ecommerce;

class Customer {
    public function getEndPoint(string $action) {
        return $action === 'all' ? '{version}/clientes/pagina/{param}' : '{version}/clientes/{param}';
    }
}