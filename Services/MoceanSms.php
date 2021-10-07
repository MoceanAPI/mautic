<?php
namespace MauticPlugin\MoceanApiBroadcastBundle\Services;

class MoceanSms 
{
    protected $apiKey;
    protected $apiSecret;
    protected $sender;
    protected $recipient;
    protected $message;
    protected $countryCode;

    function setApiKey($apiKey) 
    {
        $this->apiKey = $apiKey;
    }
    
    function setApiSecret($apiSecret) 
    {
        $this->apiSecret = $apiSecret;
    }
    
    function getSender() 
    {
        return $this->sender;
    }
    
    function setSender($sender) 
    {
        $this->sender = $sender;
    }
    
    function getRecipient() 
    {
        return $this->recipient;
    }
    
    function setRecipient($recipient) 
    {
        $this->recipient = $recipient;
    }
    
    function getMessage() 
    {
        return $this->message;
    }
    
    function setMessage($message) 
    {
        $this->message = $message;
    }
    
    function setCountryCode($countryCode) 
    {
        $this->countryCode = $countryCode;
    }
    
   /**
    * SMS API.
    */
    function sendBroadcast() 
    {
        $url = 'https://rest.moceanapi.com/rest/2/sms';
        $fields = array(
            'mocean-api-key' => $this->apiKey,
            'mocean-api-secret' => $this->apiSecret,
            'mocean-from' => $this->sender,
            'mocean-to' => $this->recipient,
            'mocean-text' => $this->message,
            'mocean-resp-format' => 'json',
            'mocean-medium'=>'mautic_broadcast'
        );
        $fields = json_encode($fields);

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, $fields);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);

        curl_close($ch);

        $log = '"request": '.$fields.', "response": '.$result.'';

        $json = json_decode($result, true);
        $json['log'] = $log;

        //returns an array
        return $json;
    }
    
    /**
    * Query API check credits.
    */
    public function getCredit() 
    {
        $url = 'https://rest.moceanapi.com/rest/1/account/balance?';
        $fields = array(
            'mocean-api-key'=>$this->apiKey,
            'mocean-api-secret'=>$this->apiSecret,
            'mocean-resp-format'=>'json'
        );

        $fields_string = '';
        foreach($fields as $key=>$value) {
            $fields_string .= $key.'='.$value.'&';
        }
        rtrim($fields_string, '&');

        $url_final = $url.$fields_string;

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url_final);
        curl_setopt($ch,CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);

        curl_close($ch);

        $json = json_decode($result, true);
   
        //returns an array
        return $json;
    }
  
   /**
    * Query API check pricing and currency.
    */
    public function getPricing() 
    {
        $url = 'https://rest.moceanapi.com/rest/2/account/pricing?';
        $fields = array(
            'mocean-api-key'=>$this->apiKey,
            'mocean-api-secret'=>$this->apiSecret,
            'mocean-resp-format'=>'json',
            'mocean-type'=>'verify'
        );

        $fields_string = '';
        foreach($fields as $key=>$value) {
            $fields_string .= $key.'='.$value.'&';
        }
        rtrim($fields_string, '&');

        $url_final = $url.$fields_string;

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url_final);
        curl_setopt($ch,CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  
        $result = curl_exec($ch);

        curl_close($ch);

        $json = json_decode($result, true);
    
        //returns an array
        return $json;
    }
    
    /**
    * Dev API check country code.
    */
    public function checkCountryCode() 
    {
        $url = 'https://dev.moceansms.com/public/mobileChecking?';
        $fields = array(
            'mobile_number'=>$this->recipient,
            'country_code'=>$this->countryCode
        );

        $fields_string = '';
        foreach($fields as $key=>$value) {
            $fields_string .= $key.'='.$value.'&';
        }
        rtrim($fields_string, '&');

        $url_final = $url.$fields_string;

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url_final);
        curl_setopt($ch,CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);

        curl_close($ch);
   
        //returns checked mobile number, empty if invalid format
        return $result;
    }
}
?>
