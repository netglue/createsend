<?php

namespace NetglueCreateSend\Client;

class CreateSendClientTest extends \PHPUnit_Framework_TestCase
{

    public function testCanInstantiateClient()
    {
        $client = new CreateSendClient('foo');
        $this->assertInstanceOf('NetglueCreateSend\Client\CreateSendClient', $client);
    }

}
