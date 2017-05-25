<?php

namespace Buuum;

final class StickerAddresse
{
    private $name;
    private $addresse;
    private $city;
    private $postal_code;
    private $phone;
    private $lang;
    private $country;

    public function __construct($name, $addresse, $city, $postal_code, $phone, $lang = 'ES', $country = 'ES')
    {
        $this->name = $name;
        $this->addresse = $addresse;
        $this->city = $city;
        $this->postal_code = $postal_code;
        $this->phone = $phone;
        $this->lang = $lang;
        $this->country = $country;
    }

    public function name()
    {
        return $this->name;
    }

    public function addresse()
    {
        return $this->addresse;
    }

    public function city()
    {
        return $this->city;
    }

    public function postalCode()
    {
        return $this->postal_code;
    }

    public function lang()
    {
        return $this->lang;
    }

    public function phone()
    {
        return $this->phone;
    }

    public function country()
    {
        return $this->country;
    }

    public function equals(StickerAddresse $stickerInfo)
    {
        return $this->city() === $stickerInfo->city()
            && $this->lang() === $stickerInfo->lang()
            && $this->country() === $stickerInfo->country()
            && $this->postalCode() === $stickerInfo->postalCode()
            && $this->name() === $stickerInfo->name()
            && $this->addresse() === $stickerInfo->addresse()
            && $this->phone() === $stickerInfo->phone()
            ;
    }

}