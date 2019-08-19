<?php

namespace App;

use App\Structures\AddressItem;
use App\Structures\ProductItem;
use GuzzleHttp\Client;

/**
 * Simple Printful API call wrapper
 */
class ApiService
{
    /**
     * @var string
     */
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param ProductItem[] $products
     * @param AddressItem $address
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRates(array $products, AddressItem $address): array
    {
        $body = [
            'recipient' => [
                'address1' => $address->getAddress(),
                'city' => $address->getCity(),
                'country_code' => $address->getCountryCode(),
                'state_code' => $address->getStateCode(),
                'zip' => $address->getZip(),
            ],
            'items' => [],
        ];

        /** @var ProductItem $product */
        foreach ($products as $product) {
            $body['items'][] = [
                'variant_id' => $product->getVariantId(),
                'external_variant_id' => $product->getExternalVariantId(),
                'warehouse_product_variant_id' => $product->getWarehouseProductVariantId(),
                'quantity' => $product->getQuantity(),
                'value' => $product->getValue(),
            ];
        }

        $res = (new Client)->request('POST',    'https://api.printful.com/shipping/rates', [
            'headers' => [
                'authorization' => 'Basic ' . base64_encode($this->apiKey),
            ],
            'body' => json_encode($body),
        ]);

        $rates = [];
        $response = @json_decode($res->getBody()->getContents());

        if (property_exists($response, 'code') && $response->code == 200) {
            $rates = $response->result;
        }

        return $rates;
    }
}
