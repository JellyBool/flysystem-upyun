<h1 align="center">Laravel Flysystem Upyun (又拍云)</h1>

<p align="center">:floppy_disk: 又拍云 Flysystem 实现，可直接用于 Laravel 项目。</p>


<p align="center">
<a href="https://scrutinizer-ci.com/g/JellyBool/flysystem-upyun/build-status/master"><img src="https://scrutinizer-ci.com/g/JellyBool/flysystem-upyun/badges/build.png?b=master" alt="Build Status"></a>
<a href="https://scrutinizer-ci.com/g/JellyBool/flysystem-upyun/build-status/master"><img src="https://scrutinizer-ci.com/g/JellyBool/flysystem-upyun/badges/quality-score.png?b=master" alt="Quality Score"></a>
<a href="https://packagist.org/packages/JellyBool/flysystem-upyun"><img src="https://poser.pugx.org/JellyBool/flysystem-upyun/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/JellyBool/flysystem-upyun"><img src="https://poser.pugx.org/JellyBool/flysystem-upyun/v/unstable.svg" alt="Latest Unstable Version"></a>
<a href="https://packagist.org/packages/JellyBool/flysystem-upyun"><img src="https://poser.pugx.org/JellyBool/flysystem-upyun/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/JellyBool/flysystem-upyun"><img src="https://poser.pugx.org/JellyBool/flysystem-upyun/license" alt="License"></a>
</p>


# Requirement

- PHP >= 5.5.9

# 视频教程
> 视频使用教程(当然是免费的)：https://www.codecasts.com/series/awesome-laravel-packages/episodes/8

# 安装

直接可以通过 composer 来安装:
```shell

$ composer require "jellybool/flysystem-upyun"
```

# 使用

## 1.在一般项目中使用

```php

use League\Flysystem\Filesystem;
use JellyBool\Flysystem\Upyun\UpyunAdapter;

$bucket = 'your-bucket-name';
$operator = 'oparator-name';
$password = 'operator-password';
$domain = 'xxxxx.b0.upaiyun.com'; // 或者 https://xxxx.b0.upaiyun.com

$adapter = new UpyunAdapter($bucket, $operator, $password, $domain);

$flysystem = new Filesystem($adapter);

```

## 2.在 Laravel 中使用

1.在 `config/app.php` 添加 `UpyunServiceProvider`:

```php

'providers' => [
    // Other service providers...
    JellyBool\Flysystem\Upyun\UpyunServiceProvider::class,
],
```
2.在 `config/filesystems.php` 的 `disks` 中添加下面的配置：

```php

return [
    //...
      'upyun' => [
                'driver'        => 'upyun', 
                'bucket'        => 'your-bucket-name',// 服务名字
                'operator'      => 'oparator-name', // 操作员的名字
                'password'      => 'operator-password', // 操作员的密码
                'domain'        => 'xxxxx.b0.upaiyun.com', // 服务分配的域名
                'protocol'     => 'https', // 服务使用的协议，如需使用 http，在此配置 http
            ],
    //...
];

```

# API 和方法调用

```php

bool $flysystem->write('file.md', 'contents');

bool $flysystem->writeStream('file.md', fopen('path/to/your/local/file.jpg', 'r'));

bool $flysystem->update('file.md', 'new contents');

bool $flysystem->updateStram('file.md', fopen('path/to/your/local/file.jpg', 'r'));

bool $flysystem->rename('foo.md', 'bar.md');

bool $flysystem->copy('foo.md', 'foo2.md');

bool $flysystem->delete('file.md');

bool $flysystem->has('file.md');

string|false $flysystem->read('file.md');

array $flysystem->listContents();

array $flysystem->getMetadata('file.md');

int $flysystem->getSize('file.md');

string $flysystem->getUrl('file.md'); 

string $flysystem->getMimetype('file.md');

int $flysystem->getTimestamp('file.md');

```

# License

MIT
