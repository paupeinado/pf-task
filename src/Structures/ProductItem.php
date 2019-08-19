<?php

namespace App\Structures;

/**
 * Product information.
 */
class ProductItem
{
    /**
     * @var string
     */
    private $variantId;
    /**
     * @var string
     */
    private $externalVariantId;
    /**
     * @var string
     */
    private $warehouseProductVariantId;
    /**
     * @var int
     */
    private $quantity;
    /**
     * @var string
     */
    private $value;

    /**
     * ProductItem constructor.
     * @param $variantId
     * @param $quantity
     */
    public function __construct($variantId, $quantity)
    {
        $this->setVariantId($variantId);
        $this->setQuantity($quantity);
    }

    /**
     * @return string
     */
    public function getVariantId()
    {
        return $this->variantId;
    }

    /**
     * @param string $variantId
     */
    public function setVariantId(string $variantId)
    {
        $this->variantId = $variantId;
    }

    /**
     * @return string
     */
    public function getExternalVariantId()
    {
        return $this->externalVariantId;
    }

    /**
     * @param string $externalVariantId
     */
    public function setExternalVariantId(string $externalVariantId)
    {
        $this->externalVariantId = $externalVariantId;
    }

    /**
     * @return string
     */
    public function getWarehouseProductVariantId()
    {
        return $this->warehouseProductVariantId;
    }

    /**
     * @param string $warehouseProductVariantId
     */
    public function setWarehouseProductVariantId(string $warehouseProductVariantId)
    {
        $this->warehouseProductVariantId = $warehouseProductVariantId;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }
}
