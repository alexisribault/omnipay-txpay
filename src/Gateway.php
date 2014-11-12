<?php

namespace Omnipay\TxPay;

use Omnipay\TxPay\Message\LoadCardRequest;

use Omnipay\Common\AbstractGateway;

/**
 * Balanced Gateway
 *
 * @link https://balanced.com/docs/api
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Balanced';
    }

    public function getDefaultParameters()
    {
        return array(
            'apiKey' => '',
            'marketplace' => ''
        );
    }

    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

 

    /**
     * @param array $parameters
     * @return PurchaseRequest
     */
    public function loadCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TxPay\Message\LoadCardRequest', $parameters);
    }

   
}