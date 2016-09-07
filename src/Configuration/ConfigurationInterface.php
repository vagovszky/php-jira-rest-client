<?php
/**
 * Created by PhpStorm.
 * User: keanor
 * Date: 17.08.15
 * Time: 21:58
 */
namespace JiraRestApi\Configuration;

/**
 * Interface ConfigurationInterface
 *
 * @package JiraRestApi\Configuration
 */
interface ConfigurationInterface
{
    /**
     * Jira host
     *
     * @return string
     */
    public function getJiraHost();

    /**
     * Jira login
     *
     * @return string
     */
    public function getJiraUser();

    /**
     * Jira password
     *
     * @return string
     */
    public function getJiraPassword();

    /**
     * Curl options CURLOPT_SSL_VERIFYHOST
     *
     * @return boolean
     */
    public function isCurlOptSslVerifyHost();

    /**
     * Curl options CURLOPT_SSL_VERIFYPEER
     *
     * @return boolean
     */
    public function isCurlOptSslVerifyPeer();

    /**
     * Curl options CURLOPT_VERBOSE
     *
     * @return boolean
     */
    public function isCurlOptVerbose();
    
    /**
     * Curl option CURLOPT_CONNECTTIMEOUT
     * return int
     */
    public function getCurlConnectionTimeout();
    
    /**
     * Curl option CURLOPT_TIMEOUT 
     */
    public function getCurlTimeout();
    
}