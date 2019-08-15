<?php

use PHPUnit\Framework\TestCase;

class EBranvoTest extends TestCase {
    private $ebranvo;

    public function setUp() {
        $this->ebranvo = new \EbranvoSdk();
    }

    public function test_should_throws_exception_when_property_not_exists() {
        $ebranvo->clients->add([
            'type'      => 'PF',
            'name'      => 'NOME DO CLIENTE',
            'document'  => '04394552001',
            'phone'     => '54999999999',
            'mail'      => 'dev@branvo.com',
            'birthDate' => '2019-07-15',
            'gender'    =>'2',
            'active'    => 1
        ]);
        
        $ebranvo->addresses->add([
            'street'          => 'Rua João Pessoa',
            'number'          => '17',
            'complement'      => 'Sala 04',
            'district'        => 'Centro',
            'city'            => 'Garibaldi',
            'state'           => 'RS',
            'postcode'        => '95720000',
            'responsibleName' => 'Cleberson Bieleski',
            'reference'       => 'Super Apolo',
            'type'            => 1,
            'active'          => 1
        ]);

        $ebranvo->send();
    }
}