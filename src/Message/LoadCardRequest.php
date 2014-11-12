<?php

namespace Omnipay\TxPay\Message;

/**
 * Balanced Create Credit Card Request.
 */
class LoadCardRequest extends AbstractRequest
{
    public function getData()
    {
        $data = array();
        $data['login'] = "123";
        $data['password'] = "123";
        $data['cardholderID'] = "123";
         return $data;
    }

    /*  public function sendData($data)
    {
        return $this->response = new Response($this, $data);
    }*/
    
    public function getEndpoint()
    {
        return $this->endpoint;
    }

   
}