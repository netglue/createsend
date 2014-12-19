<?php


namespace NetglueCreateSendApi\Client\Listener;

use Guzzle\Common\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ExceptionListener implements EventSubscriberInterface
{

    private $exceptionNs = '\NetglueCreateSendApi\Exception';

    private $errorMap = array(
        'unknown' => 'UnknownErrorException',
        1         => 'InvalidEmailAddressException',
        100       => 'InvalidApiKeyException',
        120       => 'InvalidOauthTokenException',
        121       => 'ExpiredOauthTokenException',
        201       => 'SubscriberExistsException',
        203       => 'SubscriberDoesNotExistException',
        204       => 'EmailSuppressedException',
        205       => 'EmailDeletedException',
        206       => 'EmailUnsubscribedException',
        207       => 'EmailBouncedException',
        208       => 'EmailUnconfirmedException',
        211       => 'InvalidEmailAddressException',
    );

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array('request.exception' => 'handleError');
    }

    /**
     * @param  Event $event
     * @return void
     * @throws \NetglueCreateSendApi\Exception\ExceptionInterface
     */
    public function handleError(Event $event)
    {
        $response = $event['response'];

        if (null === $response || $response->getStatusCode() === 200) {
            return;
        }

        $body      = json_decode((string)$response->getBody(), true);
        $code      = isset($body['Code']) ? (int) $body['Code'] : 'unknown';
        $message   = isset($body['Message']) ? $body['Message'] : 'Unknown Error';
        $exception = sprintf('%s\\%s', $this->exceptionNs, $this->errorMap[$code]);
        if($code === 'unknown') {
            $code = null;
        }
        throw new $exception($message, $code);
    }

}
