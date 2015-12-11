<?php

namespace JiraRestApi\User;

use JiraRestApi\Project\Project;
use JiraRestApi\Project\Role;
use JiraRestApi\Group\Group;

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
        $ret = $this->exec($this->uri."?username=".urlencode($username), null);

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
     * Add User to project role
     * @param \JiraRestApi\User\User $user
     * @param \JiraRestApi\Project\Project $project
     * @param \JiraRestApi\Project\Role $role
     */
    public function addUserToProjectRole(User $user, Project $project, Role $role){
        
        $data = json_encode((object) ["user" => [$user->name]]);
        
        $projectKey = $project->key;
        $roleId = $role->id;
        
        $ret = $this->exec("/project/$projectKey/role/$roleId", $data, 'POST');
        
        $role = $this->json_mapper->map(
             json_decode($ret), new Role()
        );
        
        return $role;
        
    }
    
    /**
     * Delete User from project role
     * @param \JiraRestApi\User\User $user
     * @param \JiraRestApi\Project\Project $project
     * @param \JiraRestApi\Project\Role $role
     * @return type
     */
    public function deleteUserFromProjectRole(User $user, Project $project, Role $role){
        
        $data = json_encode((object) ["user" => [$user->name]]);
        
        $projectKey = $project->key;
        $roleId = $role->id;
        
        $ret = $this->exec("/project/$projectKey/role/$roleId", $data, 'DELETE');
        
        return $ret;
        
    }
    
    /**
     * Add user to group
     * @param \JiraRestApi\User\User $user
     * @param \JiraRestApi\Group $group
     * @return \JiraRestApi\Group
     */
    public function addUserToGroup(User $user, Group $group){
        
        $data = json_encode($user);
        
        $ret = $this->exec("/group/user?groupname=".urlencode($group->name), $data, 'POST');
        
        $group = $this->json_mapper->map(
             json_decode($ret), new Group()
        );
        
        return $group;
    }
    
    /**
     * Delete User from group
     * @param \JiraRestApi\User\User $user
     * @param \JiraRestApi\Group\Group $group
     * @return \JiraRestApi\Group\Group
     */
    public function deleteUserFromGroup(User $user, Group $group){
                
        $ret = $this->exec("/group/user?groupname=" . urlencode($group->name) . "&username=" . urlencode($user->name), true, 'DELETE');
        
        $group = $this->json_mapper->map(
             json_decode($ret), new Group()
        );
        
        return $group;
    }
}

