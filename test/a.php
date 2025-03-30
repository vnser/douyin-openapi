<?php
require_once __DIR__ . '/../vendor/autoload.php';
// 创建缓存实例
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

$cache = new FilesystemAdapter();

// 设置缓存（key, value, 过期时间）
$a = $cache->get('my_cache_key', function () {
    return 'Hello, Cache!'; // 如果缓存不存在，则存入这个值
});

print_r($a);