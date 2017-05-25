<?php

namespace Buuum;

final class StickerPointRelais
{
    private $pointId;
    private $country;

    public function __construct($pointId, $country = 'ES')
    {
        $this->setPointId($pointId);
        $this->setCountry($country);
    }

    protected function setPointId($pointId)
    {
        if (!preg_match('@^(|[0-9]{6})$@', $pointId)) {
            throw new \InvalidArgumentException();
        }
        $this->pointId = $pointId;
    }

    protected function setCountry($country)
    {
        if (!preg_match('@^[A-Z]{2}$@', $country)) {
            throw new \InvalidArgumentException();
        }
        $this->country = $country;
    }


    public function id()
    {
        return $this->pointId;
    }

    public function country()
    {
        return $this->country;
    }

    public function equals(StickerPointRelais $stickerInfo)
    {
        return $this->country() === $stickerInfo->country()
            && $this->id() === $stickerInfo->id();
    }

}