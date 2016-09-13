Jira rest api
=============

## Usage

Basic usage examples.

### Configuration

```php
require 'libs/autoload.php';

use JiraRestApi\Configuration\ArrayConfiguration;
use JiraRestApi\ServiceProvider;
use JiraRestApi\JiraException;

$config = [
    "jiraHost" => "http://jira.url.xx",
    "jiraUser" => "user",
    "jiraPassword" => "password",
    "curlTimeout" => 60
];

$serviceProvider = new ServiceProvider(new ArrayConfiguration($config));
```

### Get project info

```php
try {
    $proj = $serviceProvider->getProjectService();

    $p = $proj->get('TEST');
	
    print_r($p);			
} catch (JiraException $e) {
	print("Error Occured! " . $e->getMessage());
}
```

### Get All Project list

```php
try {
    $proj = $serviceProvider->getProjectService();

    $prjs = $proj->getAllProjects();

    foreach ($prjs as $p) {
        echo sprintf("Project Key:%s, Id:%s, Name:%s, projectCategory: %s\n", $p->key, $p->id, $p->name, $p->projectCategory['name']
        );
    }
} catch (JiraException $e) {
    print("Error Occured! " . $e->getMessage());
}
```

### Issue info

```php
try {
    $issue = $serviceProvider->getIssueService();

    $info = $issue->get('TEST-123');

    print_r($info->fields);
    
} catch (JiraException $e) {
    print("Error Occured! " . $e->getMessage());
}
```

### Create issue

```php
use JiraRestApi\Issue\IssueField;
try {
    $issueField = new IssueField();

    $issueField->setProjectKey("TEST")
        ->setSummary("something's wrong")
        ->setAssigneeName("lesstif")
        ->setPriorityName("Critical")
        ->setIssueType("Bug")
        ->setDescription("Full description for issue");
	
	$issueService = $serviceProvider->getIssueService();

	$ret = $issueService->create($issueField);
	
	//If success, Returns a link to the created issue.
	print_r($ret);
} catch (JiraException $e) {
	print("Error Occured! " . $e->getMessage());
}
```

### Add Attachment

```php
use JiraRestApi\Issue\IssueField;
try {
    	
	$issueService = $serviceProvider->getIssueService();

        $ret = $issueService->addAttachments('TEST-123', array('screen_capture.png', 'bug-description.pdf', 'README.md'));

	print_r($ret);
} catch (JiraException $e) {
	print("Error Occured! " . $e->getMessage());
}
```

### Add User To Role

```php
use JiraRestApi\User\User;
use JiraRestApi\Project\Role;
use JiraRestApi\Project\Project;

$jiraRestUser = new User();
$jiraRestUser->name = 'name';
$jiraRestUser->displayName = 'full name';
$jiraRestUser->emailAddress = 'email';
          
$jiraRestProject = new Project();
$jiraRestProject->key = 'TEST';
          
$jiraRestRole = new Role();
$jiraRestRole->id = '123456';
          
try{

    $jiraRestUserService = $serviceProvider->getUserService();
    $jiraRestRole = $jiraRestUserService->addUserToProjectRole($jiraRestUser, $jiraRestProject, $jiraRestRole);

} catch (JiraException $e) {
	print("Error Occured! " . $e->getMessage());
}
```

Forked from https://github.com/lesstif/php-jira-rest-client