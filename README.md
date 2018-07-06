# image-upload
Laravel package for user activity logs in the system.

## Installation

Require this package with composer.

```shell
composer require mark-villudo/activity-logs
```


## Usage
```
  //Activity logs
  //user helper
  $data['user_id'] = $user->id;
  $data['type'] = 'user';
  $data['action'] = 'Update Profile';
  $data['description'] = 'Update profile settings.';
  storeActivity($data);
  //End activity logs
```


