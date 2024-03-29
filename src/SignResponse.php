<?php
namespace SignClient;

use Exception;

class SignResponse
{

    private $response;

    public function __construct($input_source = "php://input")
    {
        $payload = file_get_contents($input_source);
        $headers   = getallheaders();
        $client    = $headers['Client'];
        $signature = $headers['Signature'];


        if (!isset($signature) && !isset($client)) {
            throw new Exception(
                'The SecretKey/ClientKey is null, You need to set the secret-key from Config. Please double-check Config and SecretKey key. ' .
                'for the details or contact support at upttik@ung.ac.id if you have any questions.'
            );
            return false;
        }

        if (!$this->validateSignature($client, $signature, $payload)) {
            throw new Exception(
                'The SecretKey/ClientKey is invalid, as it is an empty string. Please double-check your SecretKey key. ' .
                'for the details or contact support at upttik@ung.ac.id if you have any questions.'
            );
           return false;
        }
        
        $this->response = $payload;
        return true;
    }

    public function getResponse()
    {
        return $this->response;
    }

    protected function validateSignature($client, $signature, $payload)
    {
        
        $payloadHash = hash_hmac('sha256', $payload, Config::$secretKey);
        if($client == Config::$clientKey){
            return ($payloadHash == $signature);
        }else {
            return false;
        } 
    }

}
