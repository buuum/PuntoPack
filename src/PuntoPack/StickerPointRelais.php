<?php

namespace Buuum;

final class StickerPointRelais
{
    private $pointId;
    private $city;

    public function __construct($pointId, $city = 'ES')
    {
        $this->pointId = $pointId;
        $this->city = $city;
    }

    public function id()
    {
        return $this->pointId;
    }

    public function city()
    {
        return $this->city;
    }

    public function equals(StickerPointRelais $stickerInfo)
    {
        return $this->city() === $stickerInfo->city()
            && $this->id() === $stickerInfo->id();
    }

}