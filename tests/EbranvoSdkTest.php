<?php

namespace Ebranvo;

use PHPUnit\Framework\TestCase;

class EBranvoTest extends TestCase {
    private $ebranvo;

    public function setUp() {
        $this->ebranvo = new EbranvoSdk(
            new \Ebranvo\Store('D9442D9700A98EEF27105C799496BDB9'),
            new \Ebranvo\Environment('development')
        );
    }

    public function test_should_throws_exception_when_property_not_exists() {
        $response = $this->ebranvo->allCustomer(1);
        var_dump($response); exit;

        $this->ebranvo->addCustomer([
            'type'      => 'PF',
            'name'      => 'NOME DO CLIENTE',
            'document'  => '04394552001',
            'phone'     => '54999999999',
            'mail'      => 'dev@branvo.com',
            'birthDate' => '2019-07-15',
            'gender'    =>'2',
            'active'    => 1
        ]);
    }
}