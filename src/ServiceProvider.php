<?php

/**
 * Description of ServiceProvider
 *
 * @author E351649
 */

namespace JiraRestApi;

use JiraRestApi\Configuration\ConfigurationInterface;
use JiraRestApi\Issue\IssueService;
use JiraRestApi\Project\ProjectService;
use JiraRestApi\User\UserService;

class ServiceProvider {
    
    private $configuration;
    
    public function __construct(ConfigurationInterface $configuration) {
        
        $this->configuration = $configuration;
        
    }
    
    public function getIssueService(){
        
        return new IssueService($this->configuration);
        
    }
    
    public function getProjectService(){
        
        return new ProjectService($this->configuration);
        
    }
    
    public function getUserService(){
        
        return new UserService($this->configuration);
        
    }
   
}
