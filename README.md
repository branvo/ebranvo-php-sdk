
# dezwork-php-sdk

SDK para integração com a API E-Branvo Lojas Virtuais na linguagem PHP.

## Sumário
1. [Primeiros Passos](#primeiros-passos)
2. [Cliente](#cliente)
    1. [Inserir](#inserir)
    2. [Atualizar](#atualizar)
    3. [Consultar](#consultar)
    4. [Remover](#remover)
3. [Endereço](#endereço)
    1. [Inserir](#inserir-1)
    2. [Atualizar](#atualizar-1)
    3. [Consultar](#consultar-1)
    4. [Remover](#remover-1)
    
## Primeiros Passos

Esse sdk foi criado para ser de fácil manipulação.

Comece instanciando um objeto EbranvoSdk, como no exemplo abaixo:

```php
$ebranvo = new \Ebranvo\EbranvoSdk(
    new \Ebranvo\Store('TOKEN AQUI'),
    new \Ebranvo\Environment('live ou sandbox')
);
```
Pronto, você já tem acesso às informações dessa loja.

Para isso, basta realizar uma chamada à um dos métodos: **get, all, add ou del.**

## Cliente

### Inserir

```php
$response = $ebranvo->addCustomer([
    'type'=> 'PF',
    'name'=> 'Nome do Cliente',
    'document'=> '000.000.000-00',
    'phone'=> '(00) 0000-0000',
    'mail'=> 'email@exemplo.com',
    'birthDate'=> '0000-00-00',
    'gender'=> 1,
    'active'=> true,
    'addresses'=> [
        [
            'street'=> 'Rua exemplo',
            'number'=> '0',
            'complement'=> 'Sala 00',
            'district'=> 'Centro',
            'city'=> 'São Paulo',
            'state'=> 'SP',
            'postcode'=> '00000-000',
            'responsibleName'=> 'Nome do Responsável',
            'type'=> 1,
            'active'=> true
        ]
    ]
]);

if ($response['success']) {
    echo $response['data'];
} else {
    echo $response['errorMessage'];
}

```

### Atualizar 

```php

// A presença do id indica que é uma operação de atualização
$response = $ebranvo->addCustomer([
    'id' => 123
    'active' => false
]);

if ($response['success']) {
    echo $response['data'];
} else {
    echo $response['errorMessage'];
}

```

### Consultar

#### Consultar um registro
```php
$response = $ebranvo->getCustomer($id = 123);

if ($response['success']) {
    echo $response['data'];
} else {
    echo $response['errorMessage'];
}
```

#### Consultar vários registros
```php
$response = $ebranvo->allCustomers($page = 1);

if ($response['success']) {
    echo $response['data'];
} else {
    echo $response['errorMessage'];
}
```

### Remover

```php
$response = $ebranvo->delCustomer($id = 123);

if ($response['success']) {
    echo $response['data'];
} else {
    echo $response['errorMessage'];
}
```

## Endereço

### Inserir

```php
$response = $ebranvo->addAddress([
    'idClient' => 123,
    'street'=> 'Rua exemplo',
    'number'=> '0',
    'complement'=> 'Sala 00',
    'district'=> 'Centro',
    'city'=> 'São Paulo',
    'state'=> 'SP',
    'postcode'=> '00000-000',
    'responsibleName'=> 'Nome do Responsável',
    'type'=> 1,
    'active'=> true
]);

if ($response['success']) {
    echo $response['data'];
} else {
    echo $response['errorMessage'];
}

```

### Atualizar 

```php

// A presença do id indica que é uma operação de atualização
$response = $ebranvo->addAddress([
    'id' => 321
    'active' => false
]);

if ($response['success']) {
    echo $response['data'];
} else {
    echo $response['errorMessage'];
}

```

### Consultar

#### Consultar um registro
```php
$response = $ebranvo->getAddress($id = 321);

if ($response['success']) {
    echo $response['data'];
} else {
    echo $response['errorMessage'];
}
```

#### Consultar vários registros
```php
$response = $ebranvo->allAddresses($idCustomer = 123);

if ($response['success']) {
    echo $response['data'];
} else {
    echo $response['errorMessage'];
}
```

### Remover

```php
$response = $ebranvo->delAddress($id = 321);

if ($response['success']) {
    echo $response['data'];
} else {
    echo $response['errorMessage'];
}
```
