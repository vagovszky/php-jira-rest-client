<?php

/**
 * @author E351649
 */

namespace JiraRestApi\User;

use JiraRestApi\Project\Project;
use JiraRestApi\Project\Role;

class UserService extends \JiraRestApi\JiraClient
{
    private $uri = '/user';

    /**
     * get user
     *
     * @return User class
     */
    public function get($username)
    {
        $ret = $this->exec($this->uri."?username=".$username, null);

        $user = $this->json_mapper->map(
             json_decode($ret), new User()
        );

        return $user;
    }
    
    /**
     * create user
     * 
     * @param \JiraRestApi\User\User $user
     */
    public function create(User $user){
        
        $data = json_encode($user);

        $ret = $this->exec($this->uri, $data, 'POST');

        $user = $this->json_mapper->map(
             json_decode($ret), new User()
        );

        return $user;
    }
    
    /**
     * Add User to role
     * @param \JiraRestApi\User\User $user
     * @param \JiraRestApi\Project\Project $project
     * @param \JiraRestApi\Project\Role $role
     */
    public function addUserToProjectRole(User $user, Project $project, Role $role){
        
        $data = (object) ["user" => $user->name];
        
        $projectKey = $project->key;
        $roleId = $role->id;
        
        $ret = $this->exec("/project/$projectKey/role/$roleId", $data, 'POST');
        
        $role = $this->json_mapper->map(
             json_decode($ret), new Role()
        );
        
        return $role;
        
    }
}

