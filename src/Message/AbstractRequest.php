<?php

namespace Omnipay\TxPay\Message;

/**
 * Balanced Abstract Request
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $endpoint = 'http://localhost:81/omnipaytest/testendpoint.php';

    abstract public function getEndpoint();

    public function getHttpMethod()
    {
        return 'POST';
    }

    public function sendData($data)
    {

       $httpRequest = $this->httpClient->createRequest(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            null,
            $data
        );

        $httpResponse = $httpRequest->send();

        return $this->response = new Response($this, $httpResponse->getBody()); // $data or $httpResponse->json());
        
        /*$httpResponse = $this->httpClient->post($this->getEndpoint(), null, $data)->send();
        return $this->response = new Response($this, $httpResponse->json());*/
    }

    
}