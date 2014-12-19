<?php

return array(
    'name'        => 'CreateSend',
    'apiVersion'  => '3.1',
    'description' => 'Campaign Monitor is a cloud based marketing email provider',
    'operations'  => array(


        'Subscribe' => array(
            'httpMethod'       => 'POST',
            'uri'              => 'subscribers/{ListId}.json',
            'summary'          => 'Subscribe the given email address to the list',
            'responseNotes'    => 'Returns the subscribed email address on success',
            'documentationUrl' => 'https://www.campaignmonitor.com/api/subscribers/',
            'parameters'       => array(
                'ListId' => array(
                    'description' => 'The list id to connect to',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ),
                'EmailAddress' => array(
                    'description' => 'The single email address to subscribe',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ),
                'Name' => array(
                    'description' => 'The real name of the person',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ),
                'CustomFields' => array(
                    'description' => 'Optional custom meta data for the subscriber. These are ignored unless created first at the list level',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false,
                    'items'       => array(
                        'Key'     => array(
                            'type'     => 'string',
                            'required' => true,
                        ),
                        'Value'   => array(
                            'type'     => 'string',
                            'required' => true,
                        ),
                    ),
                ),
                'Resubscribe'  => array(
                    'description' => 'This must be set to true to subscribe a previously unsubscribed user',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false,
                ),
                'RestartSubscriptionBasedAutoresponders'  => array(
                    'description' => 'Whether to require re/confirmation for double optin lists',
                    'location'    => 'json',
                    'type'        => 'boolean',
                    'required'    => false,
                ),
            ),
        ),


    ),
);
