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

    public function getPassword()
    {
        return $this->getParameter('password');
    }
    
    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }
    
    public function getLogin()
    {
        return $this->getParameter('login');
    }
    
    public function setLogin($value)
    {
        return $this->setParameter('login', $value);
    }
    
    public function sendData($data)
    {

       $httpRequest = $this->httpClient->createRequest(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            null,
            $data
        );

        $httpResponse = $httpRequest
                ->setHeader(getLogin())
                ->send();

        return $this->response = new Response($this, $httpResponse->json()); // $data or $httpResponse->json());
        
        /*$httpResponse = $this->httpClient->post($this->getEndpoint(), null, $data)->send();
        return $this->response = new Response($this, $httpResponse->json());*/
    }

    
}