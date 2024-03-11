# ISPManager6 PHP API Client

User and presets management:

## Installation

```bash
composer require p0n0marev/ispmanager6
```

## General API Usage

```php
use P0n0marev\Ispmanager6\Client;

// Token authentication
$client = new Client([
        'host'     => 'localhost',
        'username' => 'admin',
        'password' => 'secret'
]);
$client->authenticate();

// Users
$users = $client->users()->list();
print '<pre>';
print_r($users);
print '</pre>';

// Create User
$userEntity = new UserEntity([
    'name'     => 'ponomarev',
    'fullname' => 'Sergei Ponomarev',
    'passwd'   => 'secret',
    'confirm'  => 'secret',
]);

$rs = $client->users()->create($userEntity);
var_dump($rs);

// Presets
$presets = $client->presets()->list();
var_dump($presets);
```
