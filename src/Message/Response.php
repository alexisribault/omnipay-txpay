<?php

namespace Omnipay\TxPay\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Balanced Response
 */
class Response extends AbstractResponse
{
    public function isSuccessful()
    {
        return $this->data;
    }

         public function getRedirectUrl()
    {
        return $this->getRequest()->getEndpoint();
    }
    
    public function getResponseFromUrl()
    {
        $url = $this->getRequest()->getEndpoint();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 
            $url
        );
        $content = json_encode(curl_exec($ch));
        //$content = curl_getinfo ( $ch );
        //curl_close($url);
        return $content;
    }
    
    public function getMessage()
    {
        if (!$this->isSuccessful()) {
            return $this->data['description'];
        }
    }

    public function getErrorCode()
    {
        if (!$this->isSuccessful()) {
            return $this->data['category_code'];
        }
    }

    public function getTransactionReference()
    {
        if (isset($this->data['_type']) && 'debit' === $this->data['_type']) {
            return json_encode(array(
                'debit' => $this->data['uri'],
                'customer' => $this->data['customer']['uri']
            ));
        }

        if (isset($this->data['_type']) && 'refund' === $this->data['_type']) {
            return json_encode(array(
                'refund' => $this->data['uri']
            ));
        }
    }

    public function getCardReference()
    {
        if (isset($this->data['_type']) && 'card' === $this->data['_type'] && $this->data['customer']) {
            return json_encode(array(
                'card' => $this->data['uri'],
                'customer' => $this->data['customer']['uri']
            ));
        }
    }
}
