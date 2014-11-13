<?php

namespace Omnipay\TxPay;

use Omnipay\TxPay\Message\LoadCardRequest;

use Omnipay\Common\AbstractGateway;

/**
 * TxPay Gateway
 *
 * @link 
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'TxPay';
    }

    public function getDefaultParameters()
    {
        return array(
            'password' => '',
            'login' => '',
            'cardHolderID' => ''
        );
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

    public function getCardholderID()
    {
        return $this->getParameter('cardHolderID');
    }
    
    public function setCardholderID($value)
    {
        return $this->setParameter('cardHolderID', $value);
    }
    
    /**
     * @param array $parameters
     * @return \Omnipay\TxPay\Message\LoadCardRequest
     */
    public function loadCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TxPay\Message\LoadCardRequest', $parameters);
    }

   
}