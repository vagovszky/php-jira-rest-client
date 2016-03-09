<?php
/**
 * Created by PhpStorm.
 * User: keanor
 * Date: 17.08.15
 * Time: 22:23
 */

namespace JiraRestApi\Configuration;

/**
 * Class AbstractConfiguration
 *
 * @package JiraRestApi\Configuration
 */
abstract class AbstractConfiguration implements ConfigurationInterface
{
    /**
     * Jira host
     *
     * @var string
     */
    protected $jiraHost;

    /**
     * Jira login
     *
     * @var string
     */
    protected $jiraUser;

    /**
     * Jira password
     *
     * @var string
     */
    protected $jiraPassword;


    /**
     * Curl options CURLOPT_SSL_VERIFYHOST
     *
     * @var boolean
     */
    protected $curlOptSslVerifyHost = false;

    /**
     * Curl options CURLOPT_SSL_VERIFYPEER
     *
     * @var boolean
     */
    protected $curlOptSslVerifyPeer = false;

    /**
     * Curl options CURLOPT_VERBOSE
     *
     * @var boolean
     */
    protected $curlOptVerbose = false;
    
    /**
     * Curl option CURLOPT_CONNECTTIMEOUT
     * return int
     */
    protected $curlConnectionTimeout = 8;
    
    /**
     * Curl option CURLOPT_TIMEOUT 
     */
    protected $curlTimeout = 12;
    
    /**
     * Can missing properties be mapped onto existing objects
     * @var boolean 
     */
    protected $mapMissingProperties = false;

    /**
     * @return string
     */
    public function getJiraHost()
    {
        return $this->jiraHost;
    }

    /**
     * @return string
     */
    public function getJiraUser()
    {
        return $this->jiraUser;
    }

    /**
     * @return string
     */
    public function getJiraPassword()
    {
        return $this->jiraPassword;
    }

       /**
     * @return boolean
     */
    public function isCurlOptSslVerifyHost()
    {
        return $this->curlOptSslVerifyHost;
    }

    /**
     * @return boolean
     */
    public function isCurlOptSslVerifyPeer()
    {
        return $this->curlOptSslVerifyPeer;
    }

    /**
     * @return boolean
     */
    public function isCurlOptVerbose()
    {
        return $this->curlOptVerbose;
    }
    
    /**
     * Curl option CURLOPT_CONNECTTIMEOUT
     * return int
     */
    public function getCurlConnectionTimeout(){
        return $this->curlConnectionTimeout;
    }
    
    /**
     * Curl option CURLOPT_TIMEOUT 
     */
    public function getCurlTimeout(){
        return $this->curlTimeout;
    }
    
    /**
     * Can missing properties be mapped onto existing objects
     * @return boolean 
     */
    public function canMapMissingProperties(){
        return $this->mapMissingProperties;
    }
}
