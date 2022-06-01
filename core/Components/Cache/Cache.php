<?php

namespace Sergey\Framework\Components\Cache;

use Psr\SimpleCache\CacheInterface;

class Cache implements CacheInterface
{

    protected $filename = 'data/cache/cache.json';

    public function get(string $key, mixed $default = null): mixed
    {
        $content = file_get_contents($this->filename);
        if ($content) {
            $data = json_decode($content);
        } else {
            $data = [];
        }
        return $data[$key] ?? null;
    }

    public function set(string $key, mixed $value, \DateInterval|int|null $ttl = null): bool
    {
        $content = file_get_contents($this->filename);
        if ($content) {
            $data = json_decode($content);
        } else {
            $data = [];
        }

        $data[$key] = $value;

        file_put_contents($this->filename, json_encode($data));
    }

    public function delete(string $key): bool
    {
        // TODO: Implement delete() method.
    }

    public function clear(): bool
    {
        // TODO: Implement clear() method.
    }

    public function getMultiple(iterable $keys, mixed $default = null): iterable
    {
        // TODO: Implement getMultiple() method.
    }

    public function setMultiple(iterable $values, \DateInterval|int|null $ttl = null): bool
    {
        // TODO: Implement setMultiple() method.
    }

    public function deleteMultiple(iterable $keys): bool
    {
        // TODO: Implement deleteMultiple() method.
    }

    public function has(string $key): bool
    {
        $content = file_get_contents($this->filename);
        if ($content) {
            $data = json_decode($content);
        } else {
            $data = [];
        }

        return array_key_exists($key, $data);
    }
}