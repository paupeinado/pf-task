<?php

namespace App\Structures;

/**
 * Recipient location information
 */
class AddressItem
{
    /**
     * @var string
     */
    private $address;
    /**
     * @var string
     */
    private $city;
    /**
     * @var string
     */
    private $countryCode;
    /**
     * @var string
     */
    private $stateCode;
    /**
     * @var string
     */
    private $zip;

    /**
     * AddressItem constructor.
     */
    public function __construct($address, $city, $zip, $stateCode, $countryCode)
    {
        $this->setAddress($address);
        $this->setCity($city);
        $this->setStateCode($stateCode);
        $this->setCountryCode($countryCode);
        $this->setZip($zip);
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param mixed $countryCode
     */
    public function setCountryCode($countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return mixed
     */
    public function getStateCode()
    {
        return $this->stateCode;
    }

    /**
     * @param mixed $stateCode
     */
    public function setStateCode($stateCode): void
    {
        $this->stateCode = $stateCode;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip): void
    {
        $this->zip = $zip;
    }
}
