<?php

namespace App;

use App\Interfaces\CacheInterface;
use App\Interfaces\LoggerInterface;
use App\Structures\AddressItem;
use App\Structures\ProductItem;

class ShippingService
{
    /**
     * @var ApiService
     */
    private $api;

    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(ApiService $api, CacheInterface $cache, LoggerInterface $logger)
    {
        $this->api = $api;
        $this->cache = $cache;
        $this->logger = $logger;
    }

    /**
     * @param ProductItem[] $products
     * @param AddressItem $address
     * @return array
     */
    public function getRates(array $products, AddressItem $address): array
    {
        try {
            $cacheKey = sha1(json_encode($products) . json_encode($address));
            $rates = $this->cache->get($cacheKey);

            if (empty($rates)) {
                $rates = $this->api->getRates($products, $address);
                $this->cache->set($cacheKey, $rates, getenv('CACHE_TTL'));
            }
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            $rates = [];
            $this->logger->error($e->getMessage());
        } finally {
            return $rates;
        }
    }
}
