# obs-php8-sdk
Forked from https://github.com/huaweicloud/huaweicloud-sdk-php-obs

obs/esdk-obs-php 3.22.6 对php8.1+不友好，一直有弃用警告。因为公司项目急用，所以只是在一些方法上增加了添加 #[\ReturnTypeWillChange]

## 版本说明
version 1.0.* base on obs/esdk-obs-php 3.22.6 

1.0.3 修改 Obs/ObsException.php public function __construct

1.0.2 修复版本号

1.0.1 added #[\ReturnTypeWillChange]






## 使用方法

```shell
composer require marotdc/obs-php8-sdk
```

```php
<?php

require 'vendor/autoload.php';

use Obs\ObsClient;

// 配置信息
$ak = 'your_access_key';
$sk = 'your_secret_key';
$endpoint = 'your_endpoint';
$bucket = 'your_bucket_name';
$objectKey = 'your_object_key';
$filePath = 'path/to/your/file.txt';

$obsClient = ObsClient::factory ( [
    'key' => $ak,
    'secret' => $sk,
    'endpoint' => $endpoint,
    'socket_timeout' => 30,
    'connect_timeout' => 10
] );

//.......

?>

```
