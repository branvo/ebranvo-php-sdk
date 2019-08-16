<?php

namespace Ebranvo\Ecommerce;

class Customer {
    public function getEndPoint(string $action) {
        return $action === 'all' ? '/clientes/pagina' : '/clientes';
    }
}