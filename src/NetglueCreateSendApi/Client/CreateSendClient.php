<?php

namespace NetglueCreateSendApi\Client;

use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class CreateSendClient extends Client
{
    /**
     * Campaign Monitor API version
     */
    const API_VERSION = '3.1';

    /**
     * @param string $apiKey
     * @param string $version
     */
    public function __construct($apiKey, $version = self::API_VERSION)
    {
        parent::__construct();
        $this->setDefaultOption('auth', array($apiKey, 'none'));

        $this->setDescription(ServiceDescription::factory(sprintf(
            __DIR__ . '/ServiceDescription/CreateSend-%s.php',
            $version
        )));

        $this->setUserAgent('netglue-createsend-php', true);

        $this->setBaseUrl(sprintf('https://api.createsend.com/api/v%s/', $version));

        $this->getEventDispatcher()->addSubscriber(new Listener\ExceptionListener());
    }

    /**
     * {@inheritdoc}
     */
    public function __call($method, $args = array())
    {
        return parent::__call(ucfirst($method), $args);
    }

    /**
     * Get current Campaign Monitor API version
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->serviceDescription->getApiVersion();
    }
}
