<?php

namespace NeoSignClient;

/**
 * NeoSign Configuration
 */
class Config
{

    /**
     * Your app's secret key
     * 
     * @static
     */
    public static $secretKey;
    /**
     * Your apps client key
     * 
     * @static
     */
    public static $clientKey;

    /**
     * Your Production Status
     * 
     * @static
     */
    public static $isProduction = false;



    /**
     * Default options for every request
     * 
     * @static
     */
    public static $curlOptions = array();

    const DEVELOPMENT_BASE_URL = 'https://neosign-dev.tik.ung.ac.id';
    const PRODUCTION_BASE_URL = 'https://neosign.ung.ac.id';


    /**
     * Get baseUrl
     * 
     * @return string NeoSign API URL, depends on $isProduction
     */
    public static function getBaseUrl()
    {
        return Config::$isProduction ?
            Config::PRODUCTION_BASE_URL : Config::DEVELOPMENT_BASE_URL;
    }
}