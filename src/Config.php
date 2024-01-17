<?php

namespace SignClient;

/**
 * UNGSign Configuration
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

    const DEVELOPMENT_BASE_URL = 'https://dev.tik.ung.ac.id:8083';
    const PRODUCTION_BASE_URL = 'https://api.sign.ung.ac.id';


    /**
     * Get baseUrl
     * 
     * @return string UNGSign API URL, depends on $isProduction
     */
    public static function getBaseUrl()
    {
        return Config::$isProduction ?
            Config::PRODUCTION_BASE_URL : Config::DEVELOPMENT_BASE_URL;
    }
}
