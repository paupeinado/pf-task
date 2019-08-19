<?php

namespace App;

use App\Interfaces\CacheInterface;
use App\Interfaces\LoggerInterface;
use Phpfastcache\Helper\Psr16Adapter;

class FileCache implements CacheInterface
{
    /**
     * @var Psr16Adapter
     */
    private $adapter;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * FileCache constructor.
     */
    public function __construct(LoggerInterface $logger)
    {
        try {
            $this->logger = $logger;
            $this->adapter = new Psr16Adapter(getenv('CACHE_DRIVER'));
        } catch (\Phpfastcache\Exceptions\PhpfastcacheDriverCheckException $e) {
            $this->logger->error($e->getMessage());
        } catch (\Phpfastcache\Exceptions\PhpfastcacheLogicException $e) {
            $this->logger->error($e->getMessage());
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     * @param int $duration
     * @return mixed|void
     * @throws \Phpfastcache\Exceptions\PhpfastcacheSimpleCacheException
     */
    public function set(string $key, $value, int $duration)
    {
        try {
            if (!empty($this->adapter)) {
                $this->adapter->set($key, $value, $duration);
            }
        } catch (\Phpfastcache\Exceptions\PhpfastcacheSimpleCacheException $e) {
            $this->logger->error($e->getMessage());
        }
    }

    /**
     * @param string $key
     * @return mixed|null
     * @throws \Phpfastcache\Exceptions\PhpfastcacheSimpleCacheException
     */
    public function get(string $key)
    {
        try {
            $data = null;

            if (!empty($this->adapter)) {
                $data = $this->adapter->get($key);
            }
        } catch (\Phpfastcache\Exceptions\PhpfastcacheSimpleCacheException $e) {
            $this->logger->error($e->getMessage());
        } finally {
            return $data;
        }
    }
}
